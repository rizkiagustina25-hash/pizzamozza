@php
    $isNastar = mb_strtolower(trim($product->name ?? '')) === 'kue nastar';
    $isPizza = mb_strtolower((string) ($product->category ?? '')) === 'pizza';

    $cartCount = array_sum(array_map(fn($item) => (int) ($item['quantity'] ?? 0), session()->get('cart', [])));

    $rawProductImg = $product->image ?? ($product->gambar ?? ($product->foto ?? null));
    $rawProductImg = $rawProductImg ? ltrim($rawProductImg, '/') : null;
    $resolvedProductImg = null;

    if ($rawProductImg) {
        if (str_starts_with($rawProductImg, 'http://') || str_starts_with($rawProductImg, 'https://')) {
            $resolvedProductImg = $rawProductImg;
        } else {
            foreach (
                [
                    'images/' . $rawProductImg,
                    'storage/' . $rawProductImg,
                    'image/' . $rawProductImg,
                    'uploads/' . $rawProductImg,
                    $rawProductImg,
                ]
                as $imagePath
            ) {
                if (file_exists(public_path($imagePath))) {
                    $resolvedProductImg = asset($imagePath);
                    break;
                }
            }
        }
    }

    $variants = $product->variants ?? collect();
    $toppings = $toppings ?? collect();

    $basePrice = (float) ($product->price ?? 0);
    $variantPrices = $variants->pluck('price')->map(fn($price) => (float) $price);
    $minimumPrice = $variantPrices->isNotEmpty() ? $variantPrices->min() : $basePrice;
    $maximumPrice = $variantPrices->isNotEmpty() ? $variantPrices->max() : $basePrice;
    $initialSelectedPrice = $variants->isNotEmpty() ? (float) $variants->first()->price : $basePrice;
    $isOutOfStock = $product->stock !== null && (int) $product->stock <= 0;

    $ratings = $product->ratings()->with('user')->latest()->get();
    $ratingCount = $ratings->count();
    $averageRating = $ratingCount > 0 ? round($ratings->avg('rating'), 1) : 0;
    $userRating = auth()->check() ? $ratings->firstWhere('user_id', auth()->id()) : null;
    $selectedStars = (int) old('rating', $userRating?->rating ?? 5);

    $ratingActionUrl = \Illuminate\Support\Facades\Route::has('products.rating.store')
        ? route('products.rating.store', $product->id)
        : url('/produk/' . $product->id . '/rating');

    $userFotoUrl = null;
    if (auth()->check() && auth()->user()->foto_profile) {
        $rawFoto = ltrim(auth()->user()->foto_profile, '/');
        foreach (['profile/' . $rawFoto, 'storage/' . $rawFoto, $rawFoto] as $fotoPath) {
            if (file_exists(public_path($fotoPath))) {
                $userFotoUrl = asset($fotoPath);
                break;
            }
        }
        $userFotoUrl ??= asset('profile/' . $rawFoto);
    }
@endphp

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $product->name }} - PizzaMozza</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <style>
        :root {
            --primary: #c51f2b;
            --primary-dark: #a71923;
            --primary-light: #fff1ef;
            --dashboard-red: #941919;
            --dashboard-red-hover: #b52d2d;
            --text: #29211f;
            --muted: #827773;
            --border: #eee6e1;
            --background: #fffaf3;
            --green: #21945b;
            --shadow: 0 12px 35px rgba(65, 35, 24, .055);
        }

        * { box-sizing: border-box; margin: 0; padding: 0; }
        html { scroll-behavior: smooth; }
        body { font-family: 'DM Sans', Calibri, 'Segoe UI', sans-serif; color: var(--text); background: var(--background); font-size: 14px; }
        a { text-decoration: none; color: inherit; }
        button, input, textarea { font-family: inherit; }
        button { cursor: pointer; }

        /* SIDEBAR & TOPBAR PELANGGAN */
        .sidebar { position: fixed; inset: 0 auto 0 0; width: 265px; height: 100vh; background: var(--dashboard-red); color: white; display: flex; flex-direction: column; z-index: 100; transition: transform .25s ease; }
        .sidebar .brand { height: 88px; min-height: 88px; padding: 18px 24px; display: flex; align-items: center; gap: 12px; border-bottom: 1px solid #ffffff25; }
        .sidebar .brand-icon { width: 38px; height: 38px; flex-shrink: 0; border-radius: 50%; display: flex; align-items: center; justify-content: center; background: var(--dashboard-red-hover); color: white; font-size: 21px; }
        .sidebar .brand-text { color: white; font-size: 24px; font-weight: 700; letter-spacing: -.3px; }
        .sidebar .brand-text span { color: #ffb4a9; }
        .sidebar .brand-subtitle { margin-top: 2px; color: #f2caca; font-size: 12px; }
        .sidebar-section { padding: 24px 15px; }
        .sidebar-title { padding: 0 12px 13px; color: #e9bdbd; font-size: 11.5px; text-transform: uppercase; letter-spacing: 1.2px; font-weight: 600; }
        .sidebar-menu { list-style: none; }
        .sidebar-menu li { margin-bottom: 5px; }
        .sidebar-link { min-height: 45px; display: flex; align-items: center; gap: 12px; padding: 11px 14px; border-radius: 9px; color: #f8eaea; font-size: 15px; font-weight: 500; transition: .2s ease; }
        .sidebar-link:hover, .sidebar-link.active { background: var(--dashboard-red-hover); color: white; }
        .sidebar-icon { width: 20px; flex-shrink: 0; display: flex; align-items: center; justify-content: center; font-size: 17px; }
        .sidebar-bottom { margin-top: auto; padding: 18px 16px; border-top: 1px solid #ffffff25; }
        .user-mini { display: flex; align-items: center; gap: 10px; margin-bottom: 13px; }
        .user-avatar { width: 40px; height: 40px; flex-shrink: 0; display: flex; align-items: center; justify-content: center; overflow: hidden; border-radius: 50%; background: #ffe0e0; color: var(--dashboard-red); font-size: 17px; font-weight: 600; }
        .user-avatar img { width: 100%; height: 100%; object-fit: cover; }
        .user-info { min-width: 0; flex: 1; }
        .user-name { color: white; font-size: 14px; font-weight: 600; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; }
        .user-role { margin-top: 2px; color: #e9bdbd; font-size: 12.5px; }
        .sidebar-logout { width: 100%; min-height: 40px; display: flex; align-items: center; justify-content: center; gap: 9px; padding: 10px; border: none; border-radius: 8px; background: white; color: var(--dashboard-red); font-size: 14px; font-weight: 600; transition: .2s ease; }
        .sidebar-logout:hover { background: #fbe9e9; }

        .main-wrapper { min-height: 100vh; margin-left: 265px; }
        .topbar { height: 88px; min-height: 88px; position: sticky; top: 0; z-index: 50; padding: 15px 30px; display: flex; align-items: center; gap: 20px; background: #fffdf9; border-bottom: 1px solid #f0e1d5; }
        .topbar-heading { display: flex; flex-direction: column; justify-content: center; min-width: 150px; flex-shrink: 0; }
        .topbar-title { margin: 0; font-size: 23px; font-weight: 700; color: #3b2925; }
        .topbar-description { margin-top: 3px; color: #907d73; font-size: 13.5px; }
        .topbar-actions { margin-left: auto; display: flex; align-items: center; justify-content: flex-end; gap: 12px; flex-shrink: 0; }
        .mobile-menu { display: none; width: 40px; height: 40px; flex-shrink: 0; align-items: center; justify-content: center; border: 0; border-radius: 8px; background: #fbe9e4; color: var(--dashboard-red); font-size: 20px; }
        .topbar .cart-button { width: 42px; height: 42px; border-radius: 50%; position: relative; display: grid; place-items: center; background: #fbe9e4; color: var(--dashboard-red); font-size: 19px; }
        .topbar .cart-badge { position: absolute; top: -3px; right: -3px; min-width: 18px; height: 18px; padding: 0 4px; border-radius: 10px; background: #c52c2c; color: white; display: grid; place-items: center; font-size: 11px; font-weight: 600; }
        .btn-saya { display: inline-flex; align-items: center; justify-content: center; gap: 8px; padding: 11px 18px; border: none; border-radius: 8px; background: #c52c2c; color: white; font-size: 14.5px; font-weight: 600; }
        .btn-saya:hover { background: #a82020; color: white; }

        /* NAVBAR FREE USER */
        .site-header { position: sticky; top: 0; z-index: 100; height: 76px; padding: 0 7%; display: flex; align-items: center; justify-content: space-between; gap: 30px; background: rgba(255, 255, 255, .97); border-bottom: 1px solid var(--border); backdrop-filter: blur(15px); }
        .site-header .brand { display: flex; align-items: center; gap: 11px; flex-shrink: 0; }
        .brand-mark { width: 45px; height: 45px; display: grid; place-items: center; color: white; background: var(--primary); border-radius: 50%; font-size: 19px; box-shadow: 0 5px 13px rgba(197, 31, 43, .16); }
        .brand-name { display: block; color: var(--primary-dark); font-size: 21px; font-weight: 800; letter-spacing: -.7px; line-height: 1.1; }
        .brand-tagline { display: block; margin-top: 3px; color: var(--muted); font-size: 10px; }
        .main-nav { display: flex; align-items: center; gap: 31px; }
        .main-nav a { color: #403632; font-size: 13px; font-weight: 700; transition: .2s; }
        .main-nav a:hover, .main-nav a.active { color: var(--primary); }
        .header-actions { display: flex; align-items: center; gap: 11px; }
        .site-header .cart-button { position: relative; width: 42px; height: 42px; display: grid; place-items: center; border-radius: 50%; color: var(--primary); background: #fff5f1; font-size: 18px; }
        .cart-count { position: absolute; top: -4px; right: -4px; min-width: 17px; height: 17px; padding: 0 4px; display: grid; place-items: center; border-radius: 20px; color: white; background: var(--primary); font-size: 9px; font-weight: 800; }
        .login-button { height: 42px; min-width: 88px; padding: 0 20px; display: inline-flex; align-items: center; justify-content: center; gap: 6px; border-radius: 11px; color: white; background: var(--primary); font-size: 12px; font-weight: 700; }

        /* MAIN DETAIL PRODUK */
        .page-wrap { width: min(1160px, calc(100% - 48px)); margin: 0 auto; padding: 27px 0 45px; }
        .breadcrumb { display: flex; align-items: center; flex-wrap: wrap; gap: 10px; margin-bottom: 18px; color: #93847d; font-size: 13px; }
        .breadcrumb a:hover { color: var(--primary); }
        .breadcrumb .current { color: var(--primary-dark); font-weight: 700; }

        .alert-success, .alert-error { margin-bottom: 16px; padding: 12px 15px; border-radius: 10px; font-size: 13px; font-weight: 600; }
        .alert-success { color: #16794c; background: #eaf8ef; border: 1px solid #c7ead3; }
        .alert-error { color: #a81c1c; background: #fff0f0; border: 1px solid #f5c2c2; }

        .product-card, .reviews-card { overflow: hidden; border: 1px solid var(--border); border-radius: 20px; background: white; box-shadow: var(--shadow); }
        .product-grid { display: grid; grid-template-columns: minmax(0, .94fr) minmax(0, 1.06fr); }
        .gallery-panel { min-width: 0; padding: 27px; display: flex; flex-direction: column; justify-content: center; background: #fff5ed; }
        .main-photo { position: relative; width: 100%; max-width: 470px; aspect-ratio: 1 / .88; margin: auto; overflow: hidden; display: grid; place-items: center; border-radius: 17px; background: #f6e8dc; }
        .main-photo img { width: 100%; height: 100%; display: block; object-fit: cover; transition: transform .4s ease; }
        .main-photo:hover img { transform: scale(1.025); }
        .favorite-badge { position: absolute; top: 14px; left: 14px; padding: 7px 11px; border-radius: 30px; color: white; background: var(--primary); font-size: 10px; font-weight: 700; box-shadow: 0 4px 12px rgba(197, 31, 43, .18); }
        .photo-fallback { display: flex; flex-direction: column; align-items: center; gap: 10px; color: #a17d6a; font-size: 12px; }
        .photo-fallback i { font-size: 55px; }
        .photo-caption { margin-top: 11px; color: #a18e83; text-align: center; font-size: 11px; }

        .info-panel { min-width: 0; padding: 30px 32px; }
        .category-pill { display: inline-flex; align-items: center; gap: 6px; padding: 6px 11px; border-radius: 30px; color: var(--primary-dark); background: var(--primary-light); font-size: 11px; font-weight: 700; }
        .product-title { margin: 12px 0 7px; color: #29201d; font-size: clamp(23px, 2.4vw, 30px); line-height: 1.2; letter-spacing: -.8px; font-weight: 800; }
        .product-subtitle { color: #82736d; font-size: 13px; line-height: 1.7; }
        .product-meta { display: flex; align-items: center; flex-wrap: wrap; gap: 11px; margin-top: 13px; color: #7c6e68; font-size: 12px; }
        .product-meta .bi-check-circle-fill { color: var(--green); }
        .product-meta .bi-star-fill { color: #f59e0b; }
        .meta-separator { width: 1px; height: 14px; background: #e3d8d1; }
        .price-range { margin: 24px 0 19px; color: var(--primary); font-size: 25px; line-height: 1.3; font-weight: 800; letter-spacing: -.7px; }
        .section-label { display: block; margin-bottom: 10px; color: #342722; font-size: 12.5px; font-weight: 800; }

        .variant-grid { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 10px; }
        .variant-option { display: block; }
        .variant-radio { position: absolute; opacity: 0; pointer-events: none; }
        .variant-card { min-height: 72px; padding: 12px 13px; display: flex; align-items: center; justify-content: space-between; gap: 8px; border: 1px solid #e9dfd9; border-radius: 12px; background: white; cursor: pointer; transition: .2s; }
        .variant-card:hover { border-color: #d99b9b; }
        .variant-radio:checked+.variant-card { border: 1.5px solid var(--primary); background: #fff7f5; box-shadow: 0 4px 12px rgba(197, 31, 43, .06); }
        .variant-title { display: block; color: #382a25; font-size: 12.5px; font-weight: 700; }
        .variant-price { display: block; margin-top: 5px; color: var(--primary); font-size: 12.5px; font-weight: 800; }
        .variant-check { color: var(--primary); font-size: 16px; opacity: 0; transition: .2s; }
        .variant-radio:checked+.variant-card .variant-check { opacity: 1; }

        .topping-area { margin-top: 19px; }
        .topping-list { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 8px; }
        .topping-option { min-height: 53px; padding: 9px 10px; display: flex; align-items: center; justify-content: space-between; gap: 7px; border: 1px solid var(--border); border-radius: 10px; background: white; cursor: pointer; transition: .2s; }
        .topping-option:has(input:checked) { border-color: var(--primary); background: #fff7f5; }
        .topping-option input { accent-color: var(--primary); }
        .topping-name { display: block; color: #493a34; font-size: 11.5px; font-weight: 700; }
        .topping-price { display: block; margin-top: 3px; color: var(--primary); font-size: 10.5px; font-weight: 700; }

        .quantity-area { margin-top: 20px; }
        .quantity-control { height: 43px; display: inline-flex; overflow: hidden; border: 1px solid #e9dfd9; border-radius: 10px; background: white; }
        .quantity-control button { width: 42px; color: var(--primary); background: #fff8f5; border: none; font-size: 18px; font-weight: 700; }
        .quantity-control button:hover { background: #ffebe6; }
        .quantity-control input { width: 53px; border: 0; border-left: 1px solid #eee4de; border-right: 1px solid #eee4de; outline: none; color: #30231e; text-align: center; font-size: 13px; font-weight: 700; }
        input[type=number]::-webkit-inner-spin-button, input[type=number]::-webkit-outer-spin-button { -webkit-appearance: none; }
        input[type=number] { -moz-appearance: textfield; }

        .total-box { margin-top: 17px; padding: 13px 15px; border: 1px solid #f0e2d8; border-radius: 12px; background: #fffaf5; }
        .total-box p { color: #99867b; font-size: 10px; font-weight: 700; letter-spacing: .7px; text-transform: uppercase; }
        .total-box strong { display: block; margin-top: 4px; color: var(--primary); font-size: 22px; font-weight: 800; }

        .guest-notice { margin-top: 17px; padding: 13px 14px; display: flex; align-items: center; justify-content: space-between; gap: 12px; border: 1px solid #f8dcd6; border-radius: 12px; background: #fff3f0; }
        .guest-copy { min-width: 0; display: flex; align-items: flex-start; gap: 10px; color: var(--primary-dark); }
        .guest-copy>i { margin-top: 2px; font-size: 15px; }
        .guest-copy strong { display: block; font-size: 12px; font-weight: 800; }
        .guest-copy span { display: block; margin-top: 4px; color: #806b63; font-size: 10.5px; line-height: 1.5; }
        .guest-login { flex-shrink: 0; padding: 10px 13px; border-radius: 9px; color: white; background: var(--primary); font-size: 11px; font-weight: 800; }

        .submit-button, .whatsapp-button { width: 100%; min-height: 46px; margin-top: 13px; display: flex; align-items: center; justify-content: center; gap: 8px; border: none; border-radius: 10px; color: white; background: var(--primary); font-size: 13px; font-weight: 800; box-shadow: 0 5px 13px rgba(197, 31, 43, .14); transition: .2s; }
        .submit-button:hover { background: var(--primary-dark); transform: translateY(-1px); }
        .whatsapp-button { background: #16874b; }
        .whatsapp-button:hover { background: #126e3d; }

        .preorder-box { margin-top: 17px; padding: 14px; border: 1px solid #f2dfd0; border-radius: 12px; background: #fff9f3; }
        .preorder-box input { width: 100%; padding: 10px; border: 1px solid #eadbd0; border-radius: 8px; background: white; font-size: 12px; outline: none; }
        .preorder-box p { margin-top: 7px; color: var(--muted); font-size: 11px; }

        /* REVIEWS */
        .reviews-card { margin-top: 18px; padding: 24px 28px 28px; }
        .reviews-header { display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: 16px; border-bottom: 1px solid var(--border); margin-bottom: 22px; }
        .reviews-tab-active { position: relative; display: inline-flex; align-items: center; gap: 7px; padding: 6px 3px 14px; color: var(--primary); font-size: 14px; font-weight: 800; }
        .reviews-tab-active::after { content: ''; position: absolute; left: 0; right: 0; bottom: -1px; height: 2.5px; background: var(--primary); }
        .reviews-summary { display: flex; align-items: center; gap: 10px; padding-bottom: 10px; }
        .reviews-score { font-size: 24px; font-weight: 800; color: var(--primary); line-height: 1; }
        .reviews-stars-row { display: flex; align-items: center; gap: 2px; color: #f59e0b; font-size: 12px; }
        .reviews-stars-row .empty { color: #dfd4ce; }
        .reviews-count-text { margin-top: 2px; font-size: 11px; color: var(--muted); }
        .reviews-layout { display: grid; grid-template-columns: minmax(0, .92fr) minmax(0, 1.08fr); gap: 24px; align-items: start; }
        .review-form-panel { padding: 20px; border: 1px solid #f0e2d8; border-radius: 15px; background: #fffaf5; }
        .review-form-panel h3 { font-size: 14px; font-weight: 800; color: #29201d; margin-bottom: 4px; }
        .review-form-panel .form-hint { font-size: 11.5px; color: var(--muted); margin-bottom: 14px; }
        .star-picker { display: flex; align-items: center; gap: 6px; margin-bottom: 15px; }
        .star-pick-btn { background: transparent; border: none; padding: 2px; color: #dcd0c9; font-size: 22px; transition: transform .15s ease, color .15s ease; }
        .star-pick-btn:hover { transform: scale(1.15); }
        .star-pick-btn.active { color: #f59e0b; }
        .star-pick-label { margin-left: 8px; font-size: 12px; font-weight: 800; color: var(--primary); }
        .review-field-label { display: block; margin-bottom: 6px; font-size: 11.5px; font-weight: 800; color: #493a34; }
        .review-textarea { width: 100%; min-height: 92px; padding: 11px 13px; border: 1px solid #e6dad2; border-radius: 11px; background: white; color: var(--text); font-size: 12.5px; line-height: 1.6; resize: vertical; outline: none; }
        .review-textarea:focus { border-color: var(--primary); }
        .review-submit-btn { width: 100%; min-height: 42px; margin-top: 12px; display: inline-flex; align-items: center; justify-content: center; gap: 7px; border: none; border-radius: 10px; background: var(--primary); color: white; font-size: 12.5px; font-weight: 800; }
        .review-submit-btn:hover { background: var(--primary-dark); }
        .review-list-panel { display: flex; flex-direction: column; gap: 11px; }
        .review-item-card { padding: 14px 16px; border: 1px solid var(--border); border-radius: 14px; background: #fffdfb; }
        .review-item-head { display: flex; align-items: center; justify-content: space-between; gap: 10px; }
        .review-author { display: flex; align-items: center; gap: 10px; }
        .review-avatar { width: 34px; height: 34px; border-radius: 50%; background: var(--primary-light); color: var(--primary); font-size: 13px; font-weight: 800; display: grid; place-items: center; flex-shrink: 0; }
        .review-author-name { font-size: 12.5px; font-weight: 800; color: #29201d; }
        .verified-order-pill { display: inline-flex; align-items: center; gap: 3px; margin-left: 6px; padding: 2px 7px; border-radius: 20px; background: #eaf8ef; color: #16794c; font-size: 10px; font-weight: 700; }
        .review-item-stars { display: flex; align-items: center; gap: 2px; margin-top: 3px; color: #f59e0b; font-size: 11px; }
        .review-item-stars .empty { color: #dfd4ce; }
        .review-time { font-size: 10.5px; color: #9b8b82; flex-shrink: 0; }
        .review-comment-body { margin-top: 9px; font-size: 12px; color: #5c4f49; line-height: 1.65; }
        .review-empty-state { padding: 32px 20px; border: 1px dashed #e6d7ce; border-radius: 14px; text-align: center; color: var(--muted); font-size: 12px; line-height: 1.6; }
        .review-empty-state i { display: block; font-size: 24px; color: #d6c5bc; margin-bottom: 8px; }
        .site-footer { padding: 23px 15px; color: #9b8b82; text-align: center; font-size: 12px; }

        /* LOGOUT MODAL */
        .logout-modal { position: fixed; inset: 0; z-index: 9999; display: none; align-items: center; justify-content: center; padding: 20px; background: rgba(35, 15, 15, 0.55); }
        .logout-modal.show { display: flex; }
        .logout-dialog { width: 100%; max-width: 380px; padding: 30px 25px; text-align: center; background: #fffaf3; border: 1px solid #f0e1d5; border-radius: 18px; box-shadow: 0 15px 45px rgba(0, 0, 0, 0.2); }
        .logout-modal-icon { width: 65px; height: 65px; margin: 0 auto 18px; display: flex; align-items: center; justify-content: center; border-radius: 50%; background: #f8e5e2; color: var(--dashboard-red); font-size: 28px; }
        .logout-dialog h3 { margin-bottom: 10px; font-size: 21px; font-weight: 700; }
        .logout-dialog p { margin-bottom: 24px; color: #81716a; font-size: 14px; line-height: 1.55; }
        .logout-modal-actions { display: flex; gap: 10px; }
        .logout-modal-actions button { flex: 1; min-height: 42px; border-radius: 9px; font-size: 14px; font-weight: 600; }
        .cancel-logout { border: 1px solid #e5d4c9; background: white; color: #59453d; }
        .confirm-logout { border: none; background: var(--dashboard-red); color: white; }

        @media (max-width: 800px) {
            .sidebar { transform: translateX(-100%); }
            .sidebar.open { transform: translateX(0); }
            .main-wrapper { margin-left: 0; }
            .mobile-menu { display: inline-flex; }
        }
        @media (max-width: 760px) {
            .site-header { height: 66px; padding: 0 15px; }
            .main-nav { display: none; }
            .page-wrap { width: calc(100% - 26px); padding-top: 17px; }
            .product-grid, .reviews-layout { grid-template-columns: 1fr; }
            .gallery-panel { padding: 17px 17px 10px; }
            .info-panel { padding: 20px 19px 22px; }
            .reviews-card { padding: 18px; }
        }
        @media (max-width: 430px) {
            .variant-grid, .topping-list { grid-template-columns: 1fr; }
        }
    </style>
</head>

<body>

    {{-- BAGIAN ATAS: SIDEBAR JIKA LOGIN, TOP NAVBAR JIKA BELUM LOGIN --}}
    @auth
        <aside class="sidebar" id="sidebar">
            <div class="brand">
                <div class="brand-icon"><i class="fa-solid fa-pizza-slice"></i></div>
                <div>
                    <div class="brand-text">Pizza<span>Mozza</span></div>
                    <div class="brand-subtitle">Fresh, Tasty, Happiness!</div>
                </div>
            </div>

            <div class="sidebar-section">
                <div class="sidebar-title">Main Menu</div>
                <ul class="sidebar-menu">
                    <li>
                        <a href="{{ route('dashboard') }}" class="sidebar-link">
                            <span class="sidebar-icon"><i class="bi bi-grid-1x2-fill"></i></span>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('products.index') }}" class="sidebar-link active">
                            <span class="sidebar-icon"><i class="bi bi-box-seam"></i></span>
                            <span>Produk</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('dashboard', ['menu' => 'orders']) }}" class="sidebar-link">
                            <span class="sidebar-icon"><i class="bi bi-bag-check"></i></span>
                            <span>Pesanan Saya</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('dashboard', ['menu' => 'profile']) }}" class="sidebar-link">
                            <span class="sidebar-icon"><i class="bi bi-person-circle"></i></span>
                            <span>Akun Saya</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="sidebar-bottom">
                <div class="user-mini">
                    <div class="user-avatar">
                        @if ($userFotoUrl)
                            <img src="{{ $userFotoUrl }}" alt="Foto profil"
                                onerror="this.style.display='none'; this.parentElement.textContent='{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}';">
                        @else
                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                        @endif
                    </div>
                    <div class="user-info">
                        <div class="user-name">{{ auth()->user()->name }}</div>
                        <div class="user-role">Pelanggan</div>
                    </div>
                </div>

                <button type="button" class="sidebar-logout" onclick="openCustomerLogoutModal()">
                    <i class="bi bi-box-arrow-right"></i> Logout
                </button>
            </div>
        </aside>
    @else
        <header class="site-header">
            <a href="{{ url('/') }}#beranda" class="brand">
                <span class="brand-mark"><i class="fa-solid fa-pizza-slice"></i></span>
                <span>
                    <span class="brand-name">PizzaMozza</span>
                    <span class="brand-tagline">Fresh, Tasty, Happiness!</span>
                </span>
            </a>

            <nav class="main-nav">
                <a href="{{ url('/') }}#beranda">Beranda</a>
                <a href="{{ url('/') }}#produk" class="active">Produk</a>
                <a href="{{ url('/') }}#tentang">Tentang Kami</a>
                <a href="{{ url('/') }}#kontak">Kontak</a>
            </nav>

            <div class="header-actions">
                <a href="{{ route('cart.index') }}" class="cart-button">
                    <i class="bi bi-cart3"></i>
                    @if ($cartCount > 0)
                        <span class="cart-count">{{ $cartCount }}</span>
                    @endif
                </a>
                <a href="{{ route('login') }}" class="login-button">Login</a>
            </div>
        </header>
    @endauth

    {{-- WRAPPER UTAMA (GESER KANAN 265PX JIKA LOGIN) --}}
    <div class="{{ auth()->check() ? 'main-wrapper' : '' }}">

        @auth
            <header class="topbar">
                <button type="button" class="mobile-menu" onclick="toggleSidebar()" aria-label="Buka menu">
                    <i class="bi bi-list"></i>
                </button>

                <div class="topbar-heading">
                    <div class="topbar-title">Detail Produk</div>
                    <div class="topbar-description">Pilih varian, topping, dan jumlah pesanan kamu.</div>
                </div>

                <div class="topbar-actions">
                    <a href="{{ route('cart.index') }}" class="cart-button" aria-label="Keranjang">
                        <i class="bi bi-cart3"></i>
                        @if ($cartCount > 0)
                            <span class="cart-badge">{{ $cartCount }}</span>
                        @endif
                    </a>

                    <a href="{{ route('dashboard', ['menu' => 'profile']) }}" class="btn-saya">
                        <i class="bi bi-person-circle"></i>
                        <span>Saya</span>
                    </a>
                </div>
            </header>
        @endauth

        <main class="page-wrap">

            {{-- BREADCRUMB --}}
            <nav class="breadcrumb">
                <a href="{{ auth()->check() ? route('products.index') : url('/') . '#produk' }}">Produk</a>
                <i class="bi bi-chevron-right"></i>
                <span class="current">{{ $product->name }}</span>
            </nav>

            {{-- ALERT --}}
            @if (session('success'))
                <div class="alert-success">
                    <i class="bi bi-check-circle-fill"></i> {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert-error">
                    @foreach ($errors->all() as $error)
                        <div><i class="bi bi-exclamation-circle-fill"></i> {{ $error }}</div>
                    @endforeach
                </div>
            @endif

            {{-- KARTU DETAIL PRODUK --}}
            <section class="product-card">
                <div class="product-grid">

                    {{-- FOTO PRODUK --}}
                    <div class="gallery-panel">
                        <div class="main-photo">
                            @if ($resolvedProductImg)
                                <img src="{{ $resolvedProductImg }}" alt="{{ $product->name }}" id="mainProductImage"
                                    onerror="this.style.display='none'; document.getElementById('photoFallback').style.display='flex';">
                                <div id="photoFallback" class="photo-fallback" style="display:none">
                                    <i class="fa-solid {{ $isPizza ? 'fa-pizza-slice' : 'fa-utensils' }}"></i>
                                    <span>Foto produk belum tersedia</span>
                                </div>
                            @else
                                <div id="photoFallback" class="photo-fallback">
                                    <i class="fa-solid {{ $isPizza ? 'fa-pizza-slice' : 'fa-utensils' }}"></i>
                                    <span>Foto produk belum tersedia</span>
                                </div>
                            @endif

                            <span class="favorite-badge">
                                <i class="bi bi-star-fill"></i> Produk Pilihan
                            </span>
                        </div>
                        <p class="photo-caption">Tampilan produk {{ $product->name }}.</p>
                    </div>

                    {{-- INFO & FORM PESAN --}}
                    <div class="info-panel">
                        <span class="category-pill">
                            {{ $isPizza ? '🍕' : '🍽️' }} {{ ucfirst($product->category ?? 'Produk') }}
                        </span>

                        <h1 class="product-title">{{ $product->name }}</h1>

                        <p class="product-subtitle">
                            {{ $product->description ?: 'Nikmati ' . $product->name . ' dengan cita rasa khas PizzaMozza dari bahan pilihan.' }}
                        </p>

                        <div class="product-meta">
                            <a href="#ulasan-produk">
                                <i class="bi bi-star-fill"></i>
                                <strong>{{ $ratingCount > 0 ? number_format($averageRating, 1) : 'Baru' }}</strong>
                                ({{ $ratingCount }} ulasan)
                            </a>
                            <span class="meta-separator"></span>
                            <span><i class="bi bi-check-circle-fill"></i> Dibuat dengan bahan pilihan</span>
                            <span class="meta-separator"></span>
                            <span><i class="bi bi-shop"></i> PizzaMozza</span>
                        </div>

                        <div class="price-range">
                            @if ($minimumPrice !== $maximumPrice)
                                Rp{{ number_format($minimumPrice, 0, ',', '.') }} – Rp{{ number_format($maximumPrice, 0, ',', '.') }}
                            @else
                                Rp{{ number_format($minimumPrice, 0, ',', '.') }}
                            @endif
                        </div>

                        <form action="{{ route('cart.add') }}" method="POST" id="productForm">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">

                            @if ($variants->count() > 0)
                                <div>
                                    <label class="section-label">
                                        {{ $isNastar ? 'Pilih Ukuran Toples' : ($isPizza ? 'Pilih Ukuran Pizza' : 'Pilih Varian') }}
                                    </label>
                                    <div class="variant-grid">
                                        @foreach ($variants as $variant)
                                            <label class="variant-option">
                                                <input type="radio" name="variant_id" value="{{ $variant->id }}"
                                                    class="variant-radio js-variant-input"
                                                    data-price="{{ (float) $variant->price }}"
                                                    {{ $loop->first ? 'checked' : '' }}>
                                                <span class="variant-card">
                                                    <span>
                                                        <span class="variant-title">{{ $variant->name }}</span>
                                                        <span class="variant-price">Rp{{ number_format((float) $variant->price, 0, ',', '.') }}</span>
                                                    </span>
                                                    <i class="bi bi-check-circle-fill variant-check"></i>
                                                </span>
                                            </label>
                                        @endforeach
                                    </div>
                                </div>
                            @endif

                            @if ($isPizza && $toppings->count() > 0)
                                <div class="topping-area">
                                    <label class="section-label">Tambah Topping (Opsional)</label>
                                    <div class="topping-list">
                                        @foreach ($toppings as $topping)
                                            <label class="topping-option">
                                                <span>
                                                    <span class="topping-name">{{ $topping->name }}</span>
                                                    <span class="topping-price">+Rp{{ number_format((float) $topping->price, 0, ',', '.') }}</span>
                                                </span>
                                                <input type="checkbox" name="toppings[]" value="{{ $topping->id }}"
                                                    class="js-topping-input" data-price="{{ (float) $topping->price }}">
                                            </label>
                                        @endforeach
                                    </div>
                                </div>
                            @endif

                            <div class="quantity-area">
                                <label class="section-label" for="quantityInput">Jumlah Pesanan</label>
                                <div class="quantity-control">
                                    <button type="button" id="qtyMinusBtn" aria-label="Kurangi jumlah">−</button>
                                    <input type="number" name="quantity" id="quantityInput" value="1" min="1" max="99">
                                    <button type="button" id="qtyPlusBtn" aria-label="Tambah jumlah">+</button>
                                </div>
                            </div>

                            <div class="total-box">
                                <p>Total Harga</p>
                                <strong id="totalPriceDisplay">Rp{{ number_format($initialSelectedPrice, 0, ',', '.') }}</strong>
                            </div>

                            @guest
                                <div class="guest-notice">
                                    <div class="guest-copy">
                                        <i class="bi bi-info-circle-fill"></i>
                                        <div>
                                            <strong>Login untuk memesan lebih mudah</strong>
                                            <span>Masuk ke akun PizzaMozza agar pesananmu tersimpan di riwayat.</span>
                                        </div>
                                    </div>
                                    <a href="{{ route('login') }}" class="guest-login">Login</a>
                                </div>
                            @endguest

                            @if ($isOutOfStock)
                                <div class="preorder-box">
                                    <label class="section-label" for="preorderDate">Tanggal Pengambilan Pre-Order</label>
                                    <input type="date" name="preorder_date" id="preorderDate" min="{{ date('Y-m-d', strtotime('+1 day')) }}">
                                    <p>Stok harian habis. Produk ini tersedia melalui sistem Pre-Order.</p>
                                </div>
                                <button type="submit" class="whatsapp-button">
                                    <i class="bi bi-clock-history"></i> Pesan Pre-Order
                                </button>
                            @else
                                <button type="submit" class="submit-button">
                                    <i class="bi bi-cart-plus"></i> Tambah ke Keranjang
                                </button>
                            @endif
                        </form>
                    </div>
                </div>
            </section>

            {{-- ULASAN & RATING PRODUK --}}
            <section class="reviews-card" id="ulasan-produk">
                <div class="reviews-header">
                    <div class="reviews-tab-active">
                        <i class="bi bi-star-fill"></i>
                        <span>Ulasan ({{ $ratingCount }})</span>
                    </div>

                    <div class="reviews-summary">
                        <span class="reviews-score">{{ number_format($averageRating, 1) }}</span>
                        <div>
                            <div class="reviews-stars-row">
                                @for ($i = 1; $i <= 5; $i++)
                                    <i class="bi bi-star-fill {{ $i <= round($averageRating) ? '' : 'empty' }}"></i>
                                @endfor
                            </div>
                            <div class="reviews-count-text">Dari {{ $ratingCount }} ulasan pelanggan</div>
                        </div>
                    </div>
                </div>

                <div class="reviews-layout">
                    <div class="review-form-panel">
                        @auth
                            <form action="{{ $ratingActionUrl }}" method="POST">
                                @csrf
                                <h3>{{ $userRating ? 'Perbarui Ulasan Kamu' : 'Beri Rating & Komentar' }}</h3>
                                <p class="form-hint">Pilih jumlah bintang dan tulis komentar tentang produk ini.</p>

                                <input type="hidden" name="rating" id="ratingInput" value="{{ $selectedStars }}">

                                <div class="star-picker" id="starPicker">
                                    @for ($star = 1; $star <= 5; $star++)
                                        <button type="button" class="star-pick-btn {{ $star <= $selectedStars ? 'active' : '' }}"
                                            data-value="{{ $star }}" aria-label="Beri {{ $star }} bintang">
                                            <i class="bi bi-star-fill"></i>
                                        </button>
                                    @endfor
                                    <span class="star-pick-label" id="starPickLabel">{{ $selectedStars }} / 5 Bintang</span>
                                </div>

                                <label for="reviewTextarea" class="review-field-label">Komentar Produk</label>
                                <textarea name="review" id="reviewTextarea" class="review-textarea"
                                    placeholder="Bagikan pendapatmu soal rasa, porsi, atau topping produk ini...">{{ old('review', $userRating?->review) }}</textarea>

                                <button type="submit" class="review-submit-btn">
                                    <i class="bi bi-send-fill"></i>
                                    <span>{{ $userRating ? 'Simpan Perubahan' : 'Kirim Ulasan' }}</span>
                                </button>
                            </form>
                        @else
                            <h3>Ingin Memberi Rating & Komentar?</h3>
                            <p class="form-hint">Login terlebih dahulu untuk memberikan penilaian bintang dan komentar pada produk ini.</p>
                            <a href="{{ route('login') }}" class="review-submit-btn">
                                <i class="bi bi-box-arrow-in-right"></i>
                                <span>Login Sekarang</span>
                            </a>
                        @endauth
                    </div>

                    <div class="review-list-panel">
                        @forelse ($ratings as $item)
                            @php
                                $hasOrdered = class_exists(\App\Models\OrderItem::class)
                                    ? \App\Models\OrderItem::where('product_id', $product->id)
                                        ->whereHas('order', fn($q) => $q->where('user_id', $item->user_id))
                                        ->exists()
                                    : false;
                            @endphp

                            <article class="review-item-card">
                                <div class="review-item-head">
                                    <div class="review-author">
                                        <div class="review-avatar">{{ strtoupper(substr($item->user->name ?? 'P', 0, 1)) }}</div>
                                        <div>
                                            <div class="review-author-name">
                                                {{ $item->user->name ?? 'Pelanggan' }}
                                                @if ($hasOrdered)
                                                    <span class="verified-order-pill"><i class="bi bi-patch-check-fill"></i> Pernah Memesan</span>
                                                @endif
                                            </div>
                                            <div class="review-item-stars">
                                                @for ($i = 1; $i <= 5; $i++)
                                                    <i class="bi bi-star-fill {{ $i <= $item->rating ? '' : 'empty' }}"></i>
                                                @endfor
                                            </div>
                                        </div>
                                    </div>
                                    <span class="review-time">{{ $item->created_at->diffForHumans() }}</span>
                                </div>

                                @if (!empty($item->review))
                                    <p class="review-comment-body">{{ $item->review }}</p>
                                @endif
                            </article>
                        @empty
                            <div class="review-empty-state">
                                <i class="bi bi-chat-square-heart"></i>
                                Belum ada ulasan untuk produk ini.<br>
                                Jadilah yang pertama memberikan rating dan komentar!
                            </div>
                        @endforelse
                    </div>
                </div>
            </section>
        </main>

        <footer class="site-footer">
            © {{ date('Y') }} PizzaMozza. All Rights Reserved.
        </footer>

    </div>

    {{-- MODAL LOGOUT PELANGGAN --}}
    @auth
        <form action="{{ route('logout') }}" method="POST" id="customerLogoutForm" style="display:none;">
            @csrf
        </form>

        <div class="logout-modal" id="customerLogoutModal">
            <div class="logout-dialog" role="dialog" aria-modal="true" aria-labelledby="customerLogoutTitle">
                <div class="logout-modal-icon"><i class="bi bi-box-arrow-right"></i></div>
                <h3 id="customerLogoutTitle">Keluar dari Akun?</h3>
                <p>Apakah kamu yakin ingin keluar dari akun PizzaMozza?</p>
                <div class="logout-modal-actions">
                    <button type="button" class="cancel-logout" onclick="closeCustomerLogoutModal()">Batal</button>
                    <button type="button" class="confirm-logout" onclick="confirmCustomerLogout()">Ya, Keluar</button>
                </div>
            </div>
        </div>
    @endauth

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            if (sidebar) sidebar.classList.toggle('open');
        }

        document.addEventListener('click', function(event) {
            const sidebar = document.getElementById('sidebar');
            const toggleBtn = document.querySelector('.mobile-menu');
            if (window.innerWidth <= 800 && sidebar && toggleBtn && sidebar.classList.contains('open') &&
                !sidebar.contains(event.target) && !toggleBtn.contains(event.target)) {
                sidebar.classList.remove('open');
            }
        });

        function openCustomerLogoutModal() {
            const modal = document.getElementById('customerLogoutModal');
            if (modal) modal.classList.add('show');
        }

        function closeCustomerLogoutModal() {
            const modal = document.getElementById('customerLogoutModal');
            if (modal) modal.classList.remove('show');
        }

        function confirmCustomerLogout() {
            const form = document.getElementById('customerLogoutForm');
            if (form) form.submit();
        }

        const logoutModal = document.getElementById('customerLogoutModal');
        if (logoutModal) {
            logoutModal.addEventListener('click', function(event) {
                if (event.target === this) closeCustomerLogoutModal();
            });
        }

        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') closeCustomerLogoutModal();
        });

        (function() {
            const basePrice = {{ json_encode($basePrice) }};
            const variantInputs = document.querySelectorAll('.js-variant-input');
            const toppingInputs = document.querySelectorAll('.js-topping-input');
            const qtyInput = document.getElementById('quantityInput');
            const qtyMinusBtn = document.getElementById('qtyMinusBtn');
            const qtyPlusBtn = document.getElementById('qtyPlusBtn');
            const totalDisplay = document.getElementById('totalPriceDisplay');

            function formatRupiah(value) {
                return 'Rp' + new Intl.NumberFormat('id-ID').format(Math.max(0, Math.round(value)));
            }

            function updateTotalPrice() {
                let unitPrice = basePrice;
                if (variantInputs.length > 0) {
                    const checkedVariant = document.querySelector('.js-variant-input:checked');
                    if (checkedVariant) unitPrice = parseFloat(checkedVariant.dataset.price || '0');
                }

                let toppingsTotal = 0;
                toppingInputs.forEach((checkbox) => {
                    if (checkbox.checked) toppingsTotal += parseFloat(checkbox.dataset.price || '0');
                });

                const qty = Math.max(1, parseInt(qtyInput?.value || '1', 10));
                if (totalDisplay) totalDisplay.textContent = formatRupiah((unitPrice + toppingsTotal) * qty);
            }

            variantInputs.forEach((radio) => radio.addEventListener('change', updateTotalPrice));
            toppingInputs.forEach((box) => box.addEventListener('change', updateTotalPrice));

            if (qtyMinusBtn && qtyInput) {
                qtyMinusBtn.addEventListener('click', () => {
                    const current = Math.max(1, parseInt(qtyInput.value || '1', 10));
                    if (current > 1) { qtyInput.value = current - 1; updateTotalPrice(); }
                });
            }

            if (qtyPlusBtn && qtyInput) {
                qtyPlusBtn.addEventListener('click', () => {
                    const current = Math.max(1, parseInt(qtyInput.value || '1', 10));
                    if (current < 99) { qtyInput.value = current + 1; updateTotalPrice(); }
                });
            }

            if (qtyInput) {
                qtyInput.addEventListener('input', updateTotalPrice);
                qtyInput.addEventListener('change', () => {
                    qtyInput.value = Math.min(99, Math.max(1, parseInt(qtyInput.value || '1', 10)));
                    updateTotalPrice();
                });
            }

            updateTotalPrice();

            const starButtons = document.querySelectorAll('#starPicker .star-pick-btn');
            const ratingInput = document.getElementById('ratingInput');
            const starPickLabel = document.getElementById('starPickLabel');
            const starPicker = document.getElementById('starPicker');

            if (starButtons.length && ratingInput) {
                function renderStars(value) {
                    starButtons.forEach((btn) => btn.classList.toggle('active', Number(btn.dataset.value) <= value));
                    if (starPickLabel) starPickLabel.textContent = value + ' / 5 Bintang';
                }

                starButtons.forEach((btn) => {
                    btn.addEventListener('mouseenter', () => renderStars(Number(btn.dataset.value)));
                    btn.addEventListener('click', () => {
                        const chosen = Number(btn.dataset.value);
                        ratingInput.value = chosen;
                        renderStars(chosen);
                    });
                });

                if (starPicker) {
                    starPicker.addEventListener('mouseleave', () => renderStars(Number(ratingInput.value || 5)));
                }
            }
        })();
    </script>

</body>
</html>