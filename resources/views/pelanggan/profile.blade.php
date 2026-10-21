<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Profile - PizzaMozza</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #faf7f2;
            color: #222;
        }

        .header {
            height: 76px;
            background: white;
            border-bottom: 1px solid #eeeeee;

            display: flex;
            align-items: center;
            justify-content: space-between;

            padding: 0 70px;
        }

        .logo {
            font-size: 25px;
            font-weight: bold;
            color: #c62828;
        }

        .logo span {
            color: #222;
        }

        .header-links {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .header-link {
            color: #333;
            text-decoration: none;
            font-size: 14px;
        }

        .header-link:hover {
            color: #c62828;
        }

        .logout-button {
            background: none;
            border: none;
            cursor: pointer;
            font-family: inherit;
            font-size: 14px;
        }

        .container {
            max-width: 900px;
            margin: 40px auto;
            padding: 0 25px;
        }

        .profile-card {
            background: white;
            border: 1px solid #eeeeee;
            border-radius: 16px;
            padding: 35px;
        }

        .title {
            font-size: 25px;
            margin-bottom: 8px;
        }

        .subtitle {
            color: #777;
            font-size: 14px;
            margin-bottom: 30px;
        }

        .profile-top {
            display: flex;
            align-items: center;
            gap: 25px;
            margin-bottom: 30px;
            padding-bottom: 25px;
            border-bottom: 1px solid #eeeeee;
        }

        .profile-photo {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #c62828;
        }

        .profile-placeholder {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background: #f5c0b3;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 45px;
        }

        .profile-name {
            font-size: 22px;
            font-weight: bold;
            margin-bottom: 7px;
        }

        .profile-role {
            color: #c62828;
            font-size: 13px;
        }

        .profile-info {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 22px;
        }

        .info-item {
            background: #fafafa;
            border-radius: 10px;
            padding: 16px;
        }

        .info-label {
            font-size: 12px;
            color: #888;
            margin-bottom: 7px;
        }

        .info-value {
            font-size: 15px;
            font-weight: 500;
        }

        .edit-button {
            display: inline-block;
            margin-top: 30px;

            background: #c62828;
            color: white;

            text-decoration: none;
            padding: 11px 20px;
            border-radius: 7px;

            font-size: 13px;
            font-weight: bold;
        }

        .edit-button:hover {
            background: #a91f1f;
        }

        .back-button {
            display: inline-block;
            margin-top: 15px;
            margin-left: 10px;

            color: #555;
            text-decoration: none;

            font-size: 13px;
        }

        @media (max-width: 650px) {

            .header {
                padding: 0 20px;
            }

            .header-links {
                gap: 10px;
            }

            .profile-card {
                padding: 25px;
            }

            .profile-info {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

    {{-- HEADER --}}
    <header class="header">

        <div class="logo">
            🍕 <span>PizzaMozza</span>
        </div>

        <div class="header-links">

            <a
                href="{{ route('dashboard') }}"
                class="header-link"
            >
                🏠 Home
            </a>

            <a
                href="{{ route('cart.index') }}"
                class="header-link"
            >
                🛒 Keranjang
            </a>

            <form
                method="POST"
                action="{{ route('logout') }}"
                style="display: inline;"
            >
                @csrf

                <button
                    type="submit"
                    class="header-link logout-button"
                >
                    Logout
                </button>
            </form>

        </div>

    </header>


    {{-- CONTENT --}}
    <main class="container">

        <div class="profile-card">

            <h1 class="title">
                Profile Saya
            </h1>

            <p class="subtitle">
                Informasi akun pelanggan PizzaMozza
            </p>


            {{-- FOTO + NAMA --}}
            <div class="profile-top">

                @if($user->foto_profile)

                    <img
                        src="{{ asset('profile/' . $user->foto_profile) }}"
                        alt="Foto Profile"
                        class="profile-photo"
                    >

                @else

                    <div class="profile-placeholder">
                        👤
                    </div>

                @endif


                <div>

                    <div class="profile-name">
                        {{ $user->name }}
                    </div>

                    <div class="profile-role">
                        Pelanggan PizzaMozza
                    </div>

                </div>

            </div>


            {{-- INFORMASI --}}
            <div class="profile-info">

                <div class="info-item">

                    <div class="info-label">
                        Nama Lengkap
                    </div>

                    <div class="info-value">
                        {{ $user->name }}
                    </div>

                </div>


                <div class="info-item">

                    <div class="info-label">
                        Email
                    </div>

                    <div class="info-value">
                        {{ $user->email }}
                    </div>

                </div>


                <div class="info-item">

                    <div class="info-label">
                        No. HP
                    </div>

                    <div class="info-value">
                        {{ $user->no_hp ?: '-' }}
                    </div>

                </div>


                <div class="info-item">

                    <div class="info-label">
                        Alamat
                    </div>

                    <div class="info-value">
                        {{ $user->address ?: '-' }}
                    </div>

                </div>

            </div>


            {{-- BUTTON --}}
            <a
                href="{{ route('profile.edit') }}"
                class="edit-button"
            >
                ✏️ Edit Profile
            </a>

            <a
                href="{{ route('dashboard') }}"
                class="back-button"
            >
                ← Kembali ke Menu
            </a>

        </div>

    </main>

</body>

</html>