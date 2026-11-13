<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PizzaMozza</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --dashboard-red: #941919;
            --dashboard-red-hover: #b52d2d;
        }

        body {
            font-family: Calibri, 'Segoe UI', sans-serif;
            font-size: 15px;
            background: #fffaf3;
            color: #34241f;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        button,
        input {
            font: inherit;
        }

        button {
            cursor: pointer;
        }

        .app {
            min-height: 100vh;
        }

        /* ================= SIDEBAR PELANGGAN ================= */

        .sidebar {
            position: fixed;
            inset: 0 auto 0 0;
            width: 265px;
            height: 100vh;
            background: var(--dashboard-red);
            color: white;
            display: flex;
            flex-direction: column;
            z-index: 100;
            transition: transform .25s ease;
        }

        .brand {
            height: 88px;
            min-height: 88px;
            padding: 18px 24px;
            display: flex;
            align-items: center;
            gap: 12px;
            border-bottom: 1px solid #ffffff25;
        }

        .brand-icon {
            width: 38px;
            height: 38px;
            flex-shrink: 0;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--dashboard-red-hover);
            color: white;
            font-size: 21px;
        }

        .brand-text {
            color: white;
            font-size: 26px;
            font-weight: 600;
            letter-spacing: -.3px;
        }

        .brand-text span {
            color: #ffb4a9;
        }

        .brand-subtitle {
            margin-top: 2px;
            color: #f2caca;
            font-size: 13px;
            font-weight: 400;
        }

        .sidebar-section {
            padding: 24px 15px;
        }

        .sidebar-title {
            padding: 0 12px 13px;
            color: #e9bdbd;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 1.2px;
            font-weight: 600;
        }

        .sidebar-menu {
            list-style: none;
        }

        .sidebar-menu li {
            margin-bottom: 5px;
        }

        .sidebar-link {
            min-height: 45px;
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 11px 14px;
            border-radius: 9px;
            color: #f8eaea;
            font-size: 15.5px;
            font-weight: 500;
            transition: .2s ease;
        }

        .sidebar-link:hover,
        .sidebar-link.active {
            background: var(--dashboard-red-hover);
            color: white;
        }

        .sidebar-icon {
            width: 20px;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 17px;
        }

        .sidebar-bottom {
            margin-top: auto;
            padding: 18px 16px;
            border-top: 1px solid #ffffff25;
        }

        .user-mini {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 13px;
            padding: 0;
            background: transparent;
        }

        .user-avatar,
        .profile-avatar {
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            border-radius: 50%;
            background: #ffe0e0;
            color: var(--dashboard-red);
            font-weight: 600;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            flex-shrink: 0;
            font-size: 17px;
        }

        .user-avatar img,
        .profile-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .user-info {
            min-width: 0;
            flex: 1;
        }

        .user-name {
            color: white;
            font-size: 14.5px;
            font-weight: 600;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .user-role {
            margin-top: 2px;
            color: #e9bdbd;
            font-size: 13px;
        }

        .sidebar-logout {
            width: 100%;
            min-height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 9px;
            padding: 10px;
            border: none;
            border-radius: 8px;
            background: white;
            color: var(--dashboard-red);
            font-size: 14.5px;
            font-weight: 600;
            transition: .2s ease;
        }

        .sidebar-logout:hover {
            background: #fbe9e9;
        }

        .sidebar-login {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 11px;
            border-radius: 8px;
            background: white;
            color: var(--dashboard-red);
            font-size: 15px;
            font-weight: 600;
        }

        .sidebar-login:hover {
            background: #fbe9e9;
        }

        /* ================= MAIN CONTENT ================= */

        .main-wrapper {
            min-height: 100vh;
            margin-left: 265px;
        }

        .topbar {
            height: 88px;
            min-height: 88px;
            position: sticky;
            top: 0;
            z-index: 50;
            padding: 15px 30px;
            display: flex;
            align-items: center;
            gap: 20px;
            background: #fffdf9;
            border-bottom: 1px solid #f0e1d5;
        }

        .topbar-heading {
            display: flex;
            flex-direction: column;
            justify-content: center;
            min-width: 150px;
            flex-shrink: 0;
        }

        .topbar-title {
            margin: 0;
            font-size: 25px;
            font-weight: 600;
            color: #3b2925;
        }

        .topbar-description {
            margin-top: 3px;
            color: #907d73;
            font-size: 14px;
        }

        .topbar-actions {
            margin-left: auto;
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 12px;
            flex-shrink: 0;
        }

        .mobile-menu {
            display: none;
            width: 40px;
            height: 40px;
            flex-shrink: 0;
            align-items: center;
            justify-content: center;
            border: 0;
            border-radius: 8px;
            background: #fbe9e4;
            color: var(--dashboard-red);
        }

        .cart-button {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            position: relative;
            display: grid;
            place-items: center;
            background: #fbe9e4;
            color: var(--dashboard-red);
        }

        .cart-badge {
            position: absolute;
            top: -3px;
            right: -3px;
            min-width: 18px;
            height: 18px;
            padding: 0 4px;
            border-radius: 10px;
            background: #c52c2c;
            color: white;
            display: grid;
            place-items: center;
            font-size: 11.5px;
        }

        .login-button,
        .btn-primary {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 11px 18px;
            border: 0;
            border-radius: 8px;
            background: var(--dashboard-red);
            color: white;
            font-size: 15px;
            font-weight: 600;
        }

        .login-button:hover,
        .btn-primary:hover {
            background: var(--dashboard-red-hover);
        }

        .btn-secondary {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 11px 18px;
            border: 1px solid var(--dashboard-red);
            border-radius: 8px;
            background: white;
            color: var(--dashboard-red);
            font-size: 15px;
            font-weight: 600;
        }

        .content {
            padding: 30px;
        }

        .page-title {
            margin-bottom: 6px;
            font-size: 30px;
            font-weight: 600;
        }

        .page-subtitle {
            margin-bottom: 25px;
            color: #907d73;
            font-size: 15.5px;
        }

        .btn-saya {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 11px 18px;
            border: none;
            border-radius: 8px;
            background: #c52c2c;
            color: white;
            font-size: 15px;
            font-weight: 600;
            text-decoration: none;
            cursor: pointer;
        }

        .btn-saya:hover {
            background: #a82020;
            color: white;
        }

        .btn-saya i {
            font-size: 17px;
        }

        /* ================= LANDING ================= */

        .landing-preview {
            min-height: 330px;
            margin-bottom: 30px;
            padding: 40px;
            border-radius: 22px;
            background: linear-gradient(135deg, #fff0e8, #ffe1d1);
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 25px;
            overflow: hidden;
        }

        .landing-content {
            max-width: 560px;
        }

        .landing-badge {
            display: inline-block;
            margin-bottom: 15px;
            padding: 7px 14px;
            border-radius: 20px;
            background: white;
            color: var(--dashboard-red);
            font-size: 13px;
            font-weight: 600;
        }

        .landing-title {
            margin-bottom: 15px;
            font-size: 42px;
            font-weight: 600;
            line-height: 1.15;
        }

        .landing-title span {
            color: var(--dashboard-red-hover);
        }

        .landing-description {
            margin-bottom: 23px;
            color: #705e54;
            font-size: 16.5px;
            line-height: 1.65;
        }

        .landing-actions {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .landing-visual {
            width: 190px;
            height: 190px;
            flex-shrink: 0;
            display: grid;
            place-items: center;
            border-radius: 50%;
            background: white;
            font-size: 85px;
            box-shadow: 0 15px 35px #00000010;
        }

        /* ================= DASHBOARD SUMMARY (2x2 MODERN) ================= */

        .dashboard-summary {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 18px;
            margin: 25px 0 32px;
        }

        .summary-card {
            min-height: 118px;
            padding: 22px 24px;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            background: linear-gradient(145deg, #ffffff 0%, #fffcf8 100%);
            border: 1px solid #efe0d3;
            border-radius: 20px;
            box-shadow: 0 8px 24px rgba(72, 44, 26, 0.045);
            overflow: hidden;
            transition: transform 0.25s ease, box-shadow 0.25s ease, border-color 0.25s ease;
        }

        .summary-card:hover {
            transform: translateY(-4px);
            border-color: #e3cbb8;
            box-shadow: 0 14px 30px rgba(72, 44, 26, 0.08);
        }

        .summary-card::before {
            content: "";
            position: absolute;
            top: 18px;
            bottom: 18px;
            left: 0;
            width: 5px;
            border-radius: 0 6px 6px 0;
            background: var(--accent, #8856df);
        }

        .summary-card:nth-child(1) {
            --accent: #8856df;
            --icon-bg: #f3edff;
            --icon-color: #7742d6;
        }

        .summary-card:nth-child(2) {
            --accent: #ef9b35;
            --icon-bg: #fff3e0;
            --icon-color: #df8214;
        }

        .summary-card:nth-child(3) {
            --accent: #18a875;
            --icon-bg: #e6f8f0;
            --icon-color: #139164;
        }

        .summary-card:nth-child(4) {
            --accent: #e64b4b;
            --icon-bg: #fdeaea;
            --icon-color: #d63636;
        }

        .summary-label {
            display: block;
            margin-bottom: 8px;
            color: #7d695e;
            font-size: 15.5px;
            font-weight: 500;
        }

        .summary-value {
            color: #2d1e1a;
            font-size: 35px;
            font-weight: 600;
            letter-spacing: -0.3px;
            line-height: 1.1;
        }

        .summary-icon {
            width: 54px;
            height: 54px;
            flex-shrink: 0;
            display: grid;
            place-items: center;
            border-radius: 16px;
            background: var(--icon-bg, #faf1eb);
            color: var(--icon-color, #34241f);
            font-size: 23px;
            transition: transform 0.25s ease;
        }

        .summary-card:hover .summary-icon {
            transform: scale(1.06);
        }

        /* ================= QUICK MENU (MODERN) ================= */

        .quick-grid {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 16px;
            margin-bottom: 32px;
        }

        .quick-card {
            min-height: 122px;
            padding: 18px;
            display: flex;
            align-items: center;
            gap: 14px;
            border-radius: 18px;
            box-shadow: 0 6px 18px rgba(52, 36, 31, 0.04);
            transition: transform 0.25s ease, box-shadow 0.25s ease, border-color 0.25s ease;
        }

        .quick-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 14px 28px rgba(52, 36, 31, 0.09);
        }

        .quick-card h3 {
            margin-bottom: 4px;
            color: #2d1e1a;
            font-size: 16.5px;
            font-weight: 600;
        }

        .quick-card p {
            color: #6e5f57;
            font-size: 13.5px;
            line-height: 1.4;
        }

        .quick-icon {
            width: 48px;
            height: 48px;
            flex-shrink: 0;
            display: grid;
            place-items: center;
            border-radius: 15px;
            background: #ffffff;
            font-size: 20px;
            transition: transform 0.25s ease;
        }

        .quick-card:hover .quick-icon {
            transform: scale(1.06);
        }

        .quick-arrow {
            margin-left: auto;
            width: 28px;
            height: 28px;
            flex-shrink: 0;
            display: grid;
            place-items: center;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.72);
            color: #4b3832;
            font-size: 18px;
            font-weight: 600;
            transition: transform 0.25s ease, background 0.25s ease;
        }

        .quick-card:hover .quick-arrow {
            background: #ffffff;
            transform: translateX(3px);
        }

        .orange {
            background: linear-gradient(135deg, #fff6ea 0%, #ffebd2 100%);
            border: 1px solid #f7dec0;
        }

        .orange .quick-icon {
            color: #e07a16;
            box-shadow: 0 6px 14px rgba(224, 122, 22, 0.16);
        }

        .blue {
            background: linear-gradient(135deg, #f0f7ff 0%, #e1eeff 100%);
            border: 1px solid #cde0fa;
        }

        .blue .quick-icon {
            color: #2563eb;
            box-shadow: 0 6px 14px rgba(37, 99, 235, 0.15);
        }

        .green {
            background: linear-gradient(135deg, #eefbf3 0%, #dcf5e6 100%);
            border: 1px solid #c5ebd5;
        }

        .green .quick-icon {
            color: #16a34a;
            box-shadow: 0 6px 14px rgba(22, 163, 74, 0.15);
        }

        .purple {
            background: linear-gradient(135deg, #f5f1ff 0%, #eae2ff 100%);
            border: 1px solid #d9ccff;
            cursor: pointer;
        }

        .purple .quick-icon {
            color: #7c3aed;
            box-shadow: 0 6px 14px rgba(124, 58, 237, 0.15);
        }

        /* ================= SECTION ================= */

        .section {
            margin-bottom: 30px;
        }

        .section-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            margin-bottom: 16px;
        }

        .section-title {
            font-size: 22px;
            font-weight: 600;
        }

        .section-link {
            color: var(--dashboard-red);
            font-size: 14.5px;
            font-weight: 600;
        }

        .latest-orders-card,
        .orders-card,
        .profile-card {
            background: white;
            border: 1px solid #f0e1d5;
            border-radius: 16px;
            box-shadow: 0 4px 15px #482c1a05;
        }

        .latest-orders-card {
            padding: 24px;
            overflow-x: auto;
        }

        .latest-orders-card h2 {
            margin-bottom: 20px;
            font-size: 21px;
            font-weight: 600;
        }

        .latest-orders-table {
            width: 100%;
            border-collapse: collapse;
        }

        .latest-orders-table th,
        .latest-orders-table td {
            padding: 15px 12px;
            text-align: left;
            border-bottom: 1px solid #f2e8e0;
            font-size: 15px;
        }

        .latest-orders-table th {
            color: #907d73;
            font-size: 13.5px;
            font-weight: 600;
            white-space: nowrap;
        }

        .latest-orders-table tr:last-child td {
            border-bottom: 0;
        }

        .order-product {
            display: flex;
            align-items: center;
            gap: 10px;
            min-width: 155px;
        }

        .order-product img {
            width: 43px;
            height: 43px;
            object-fit: cover;
            border-radius: 9px;
        }

        .order-action {
            display: inline-block;
            padding: 9px 14px;
            border-radius: 7px;
            background: var(--dashboard-red);
            color: white;
            font-size: 13.5px;
            font-weight: 600;
            white-space: nowrap;
        }

        .order-action:hover {
            background: var(--dashboard-red-hover);
        }

        .order-empty {
            padding: 28px !important;
            text-align: center !important;
            color: #907d73;
            font-size: 15px;
        }

        /* ================= PRODUCT (BEST SELLER) ================= */

        .product-grid {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 18px;
        }

        .product-card {
            overflow: hidden;
            background: white;
            border: 1px solid #f0e1d5;
            border-radius: 16px;
            transition: .2s ease;
        }

        .product-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px #0000000b;
        }

        .product-image {
            position: relative;
            height: 180px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f8f0e9;
            overflow: hidden;
        }

        .product-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .bestseller-badge {
            position: absolute;
            top: 10px;
            left: 10px;
            z-index: 2;
            display: inline-flex;
            align-items: center;
            gap: 4px;
            padding: 4px 10px;
            border-radius: 20px;
            background: rgba(148, 25, 25, 0.92);
            color: #ffffff;
            font-size: 12px;
            font-weight: 600;
            box-shadow: 0 3px 8px rgba(0, 0, 0, 0.14);
        }

        .product-placeholder {
            font-size: 55px;
        }

        .product-info {
            padding: 15px;
        }

        .product-name {
            margin-bottom: 6px;
            font-size: 17px;
            font-weight: 600;
        }

        .product-price {
            color: var(--dashboard-red);
            font-size: 16.5px;
            font-weight: 600;
        }

        .product-button {
            display: block;
            margin-top: 12px;
            padding: 10px;
            border-radius: 8px;
            background: var(--dashboard-red);
            color: white;
            text-align: center;
            font-size: 14.5px;
            font-weight: 600;
            transition: .2s ease;
        }

        .product-button:hover {
            background: var(--dashboard-red-hover);
        }

        /* ================= ORDERS ================= */

        .orders-card {
            overflow: hidden;
        }

        .order-row {
            display: flex;
            align-items: center;
            gap: 20px;
            padding: 17px 20px;
            border-bottom: 1px solid #f0e1d5;
        }

        .order-row:last-child {
            border-bottom: 0;
        }

        .order-number {
            font-size: 15.5px;
            font-weight: 600;
        }

        .order-date {
            margin-top: 4px;
            color: #99877e;
            font-size: 13.5px;
        }

        .order-total {
            margin-left: auto;
            font-size: 15.5px;
            font-weight: 600;
        }

        .status {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12.5px;
            font-weight: 600;
        }

        .status-pending {
            background: #fff4d6;
            color: #a47700;
        }

        .status-processing {
            background: #e7f1ff;
            color: #2671c9;
        }

        .status-shipped {
            background: #e8f7ff;
            color: #1582a8;
        }

        .status-completed {
            background: #e6f7ec;
            color: #208447;
        }

        .status-cancelled {
            background: #ffe8e8;
            color: #d12d2d;
        }

        /* ================= PROFILE ================= */

        .profile-card {
            max-width: 760px;
            padding: 25px;
        }

        .profile-header {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 25px;
        }

        .profile-avatar {
            width: 70px;
            height: 70px;
            flex-shrink: 0;
            font-size: 28px;
        }

        .profile-name {
            font-size: 21px;
            font-weight: 600;
        }

        .profile-email {
            margin-top: 4px;
            color: #99877e;
            font-size: 14.5px;
        }

        .profile-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 15px;
        }

        .profile-field {
            padding: 15px;
            border-radius: 9px;
            background: #fffaf5;
        }

        .profile-label {
            margin-bottom: 6px;
            color: #99877e;
            font-size: 12.5px;
            font-weight: 600;
            text-transform: uppercase;
        }

        .profile-value {
            font-size: 15.5px;
            line-height: 1.5;
            overflow-wrap: anywhere;
        }

        /* ================= EMPTY STATE ================= */

        .empty-state {
            padding: 40px 20px;
            text-align: center;
            background: white;
            border: 1px solid #f0e1d5;
            border-radius: 14px;
        }

        .empty-icon {
            margin-bottom: 12px;
            font-size: 43px;
        }

        .empty-state h3 {
            margin-bottom: 8px;
            font-size: 19px;
            font-weight: 600;
        }

        .empty-state p {
            margin-bottom: 18px;
            color: #99877e;
            font-size: 14.5px;
        }

        .footer {
            padding: 25px;
            text-align: center;
            color: #99877e;
            font-size: 13.5px;
        }

        /* ================= MODAL LOGOUT ================= */

        .logout-modal {
            position: fixed;
            inset: 0;
            z-index: 9999;
            display: none;
            align-items: center;
            justify-content: center;
            padding: 20px;
            background: rgba(35, 15, 15, 0.55);
        }

        .logout-modal.show {
            display: flex;
        }

        .logout-dialog {
            width: 100%;
            max-width: 380px;
            padding: 30px 25px;
            text-align: center;
            background: #fffaf3;
            border: 1px solid #f0e1d5;
            border-radius: 18px;
            box-shadow: 0 15px 45px rgba(0, 0, 0, 0.2);
            animation: popupFadeIn 0.2s ease;
        }

        .logout-modal-icon {
            width: 65px;
            height: 65px;
            margin: 0 auto 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: #f8e5e2;
            color: var(--dashboard-red);
            font-size: 28px;
        }

        .logout-dialog h3 {
            margin-bottom: 10px;
            color: #34241f;
            font-size: 23px;
            font-weight: 600;
        }

        .logout-dialog p {
            margin-bottom: 24px;
            color: #81716a;
            font-size: 15px;
            line-height: 1.55;
        }

        .logout-modal-actions {
            display: flex;
            gap: 10px;
        }

        .logout-modal-actions button {
            flex: 1;
            min-height: 42px;
            border-radius: 9px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.2s ease;
        }

        .cancel-logout {
            border: 1px solid #e5d4c9;
            background: #ffffff;
            color: #59453d;
        }

        .cancel-logout:hover {
            background: #f5ebe3;
        }

        .confirm-logout {
            border: none;
            background: var(--dashboard-red);
            color: #ffffff;
        }

        .confirm-logout:hover {
            background: var(--dashboard-red-hover);
        }

        @keyframes popupFadeIn {
            from {
                opacity: 0;
                transform: translateY(10px) scale(0.98);
            }

            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        /* ================= MODAL PENGANTARAN ================= */

        .delivery-modal {
            position: fixed;
            inset: 0;
            z-index: 9999;
            display: none;
            align-items: center;
            justify-content: center;
            padding: 20px;
            background: rgba(35, 15, 15, 0.55);
        }

        .delivery-modal.show {
            display: flex;
        }

        .delivery-dialog {
            position: relative;
            width: 100%;
            max-width: 430px;
            padding: 30px 26px 26px;
            background: #fffaf3;
            border: 1px solid #f0e1d5;
            border-radius: 20px;
            box-shadow: 0 18px 45px rgba(0, 0, 0, 0.22);
            text-align: center;
            animation: popupFadeIn 0.2s ease;
        }

        .delivery-close-x {
            position: absolute;
            top: 16px;
            right: 16px;
            width: 32px;
            height: 32px;
            border: none;
            border-radius: 50%;
            background: #f5ebe2;
            color: #5c433b;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }

        .delivery-close-x:hover {
            background: #ead9cc;
        }

        .delivery-modal-icon {
            width: 62px;
            height: 62px;
            margin: 0 auto 14px;
            border-radius: 50%;
            background: #f8e5e2;
            color: var(--dashboard-red);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
        }

        .delivery-dialog h3 {
            margin: 0 0 6px;
            color: #34241f;
            font-size: 23px;
            font-weight: 600;
        }

        .delivery-subtitle {
            margin: 0 0 18px;
            color: #8c786e;
            font-size: 15px;
        }

        .delivery-rates {
            display: flex;
            flex-direction: column;
            gap: 12px;
            text-align: left;
            margin-bottom: 16px;
        }

        .rate-item {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 14px 16px;
            border-radius: 14px;
            background: #ffffff;
            border: 1px solid #eeded2;
        }

        .rate-item.free {
            border-left: 4px solid #18a875;
        }

        .rate-item.paid {
            border-left: 4px solid var(--dashboard-red);
        }

        .rate-badge {
            padding: 6px 11px;
            border-radius: 8px;
            font-size: 13.5px;
            font-weight: 600;
            white-space: nowrap;
            flex-shrink: 0;
        }

        .rate-item.free .rate-badge {
            background: #eaf8ef;
            color: #18a875;
        }

        .rate-item.paid .rate-badge {
            background: #f8e5e2;
            color: var(--dashboard-red);
        }

        .rate-detail strong {
            display: block;
            color: #34241f;
            font-size: 15.5px;
            font-weight: 600;
            margin-bottom: 2px;
        }

        .rate-detail span {
            display: block;
            color: #7d6a60;
            font-size: 14px;
            line-height: 1.4;
        }

        .delivery-note {
            display: flex;
            align-items: flex-start;
            gap: 8px;
            padding: 10px 12px;
            margin-bottom: 20px;
            border-radius: 10px;
            background: #f8efe6;
            color: #6b5349;
            font-size: 14px;
            text-align: left;
            line-height: 1.45;
        }

        .delivery-note strong {
            font-weight: 600;
        }

        .delivery-note i {
            color: var(--dashboard-red);
            font-size: 15px;
            margin-top: 2px;
        }

        .delivery-confirm-btn {
            width: 100%;
            height: 44px;
            border: none;
            border-radius: 10px;
            background: var(--dashboard-red);
            color: #ffffff;
            font-size: 15.5px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.2s ease;
        }

        .delivery-confirm-btn:hover {
            background: var(--dashboard-red-hover);
        }

        /* ================= ICON ================= */

        .brand-icon i {
            color: white;
        }

        .sidebar-icon i {
            font-size: 17px;
        }

        .summary-icon i,
        .quick-icon i {
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .search-icon i {
            font-size: 15px;
        }

        .cart-button i {
            font-size: 19px;
        }

        .mobile-menu i {
            font-size: 21px;
        }

        /* ================= RESPONSIVE ================= */

        @media(max-width: 1200px) {
            .dashboard-summary {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .quick-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .product-grid {
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }
        }

        @media(max-width: 800px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.open {
                transform: translateX(0);
            }

            .main-wrapper {
                margin-left: 0;
            }

            .mobile-menu {
                display: inline-flex;
            }

            .content {
                padding: 22px 18px;
            }

            .landing-preview {
                flex-direction: column;
                text-align: center;
                padding: 30px 20px;
            }

            .landing-actions {
                justify-content: center;
            }

            .landing-visual {
                width: 140px;
                height: 140px;
                font-size: 65px;
            }

            .product-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media(max-width: 550px) {
            .topbar {
                padding: 12px 15px;
                gap: 10px;
            }

            .mobile-menu {
                display: inline-flex;
                flex-shrink: 0;
            }

            .topbar-heading {
                min-width: 0;
                flex: 1;
            }

            .topbar-title {
                font-size: 20px;
            }

            .topbar-description {
                font-size: 12.5px;
            }

            .search-box {
                display: none;
            }

            .topbar-actions {
                margin-left: auto;
                gap: 8px;
            }

            .login-button {
                padding: 10px 12px;
            }

            .content {
                padding: 20px 14px;
            }

            .dashboard-summary,
            .quick-grid,
            .product-grid,
            .profile-grid {
                grid-template-columns: 1fr;
            }

            .landing-title {
                font-size: 32px;
            }

            .latest-orders-card {
                padding: 15px;
            }

            .latest-orders-table {
                min-width: 600px;
            }

            .order-row {
                flex-wrap: wrap;
                align-items: flex-start;
            }

            .order-total {
                margin-left: 0;
            }
        }
    </style>
</head>

<body>

    @php
        $menu = request('menu', 'home');
        $currentMenu = $menu;

        $pageTitles = [
            'home' => 'Dashboard',
            'products' => 'Produk',
            'orders' => 'Pesanan Saya',
            'profile' => 'Akun Saya',
        ];

        $pageDescriptions = [
            'home' => 'Selamat datang di PizzaMozza!',
            'products' => 'Temukan pizza favorit kamu.',
            'orders' => 'Lihat status dan riwayat pesanan kamu disini.',
            'profile' => 'Informasi akun dan alamat pengiriman kamu.',
        ];
    @endphp

    <div class="app">

        <!-- ================= SIDEBAR PELANGGAN ================= -->

        <aside class="sidebar" id="sidebar">

            <div class="brand">
                <div class="brand-icon">
                    <i class="fa-solid fa-pizza-slice"></i>
                </div>

                <div>
                    <div class="brand-text">Pizza<span>Mozza</span></div>
                    <div class="brand-subtitle">Fresh, Tasty, Happiness!</div>
                </div>
            </div>

            <div class="sidebar-section">

                <div class="sidebar-title">Main Menu</div>

                <ul class="sidebar-menu">

                    <li>
                        <a href="{{ route('dashboard') }}" class="sidebar-link {{ $menu === 'home' ? 'active' : '' }}">

                            <span class="sidebar-icon">
                                <i class="bi bi-grid-1x2-fill"></i>
                            </span>

                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('products.index') }}"
                            class="sidebar-link {{ request()->routeIs('products.index') ? 'active' : '' }}">

                            <span class="sidebar-icon">
                                <i class="bi bi-box-seam"></i>
                            </span>

                            <span>Produk</span>
                        </a>
                    </li>

                    @auth
                        <li>
                            <a href="{{ route('dashboard') }}?menu=orders"
                                class="sidebar-link {{ $menu === 'orders' ? 'active' : '' }}">

                                <span class="sidebar-icon">
                                    <i class="bi bi-bag-check"></i>
                                </span>

                                <span>Pesanan Saya</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('dashboard') }}?menu=profile"
                                class="sidebar-link {{ $menu === 'profile' ? 'active' : '' }}">

                                <span class="sidebar-icon">
                                    <i class="bi bi-person-circle"></i>
                                </span>

                                <span>Akun Saya</span>
                            </a>
                        </li>
                    @endauth

                </ul>
            </div>

            <!-- Bagian profil dan logout di bawah sidebar -->
            <div class="sidebar-bottom">

                @auth
                    <div class="user-mini">

                        <div class="user-avatar">
                            @if (auth()->user()->foto_profile)
                                <img src="{{ asset('storage/' . auth()->user()->foto_profile) }}" alt="Foto profil">
                            @else
                                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                            @endif
                        </div>

                        <div class="user-info">
                            <div class="user-name">
                                {{ auth()->user()->name }}
                            </div>

                            <div class="user-role">
                                Pelanggan
                            </div>
                        </div>

                    </div>

                    <button type="button" class="sidebar-logout" onclick="openCustomerLogoutModal()">

                        <i class="bi bi-box-arrow-right"></i>
                        Logout

                    </button>
                @else
                    <a href="{{ route('login') }}" class="sidebar-login">
                        <i class="bi bi-box-arrow-in-right"></i>
                        Login
                    </a>
                @endauth

            </div>

        </aside>

        <!-- ================= MAIN WRAPPER ================= -->

        <div class="main-wrapper">

            <!-- ================= TOPBAR ================= -->

            <header class="topbar">

                <button type="button" class="mobile-menu" onclick="toggleSidebar()" aria-label="Buka menu">

                    <i class="bi bi-list"></i>

                </button>

                <div class="topbar-heading">

                    <div class="topbar-title">
                        {{ $pageTitles[$currentMenu] ?? 'Dashboard' }}
                    </div>

                    <div class="topbar-description">
                        {{ $pageDescriptions[$currentMenu] ?? '' }}
                    </div>

                </div>

                @if (request()->routeIs('products.index'))
                    <form action="{{ route('products.index') }}" method="GET" class="search-box">

                        <span class="search-icon">
                            <i class="bi bi-search"></i>
                        </span>

                        <input type="text" name="search" placeholder="Cari pizza favorit kamu..."
                            value="{{ request('search') }}">

                    </form>
                @endif

                <div class="topbar-actions">

                    <a href="{{ route('cart.index') }}" class="cart-button" aria-label="Keranjang">

                        <i class="bi bi-cart3"></i>

                        @auth
                            @php
                                $cartCount = session('cart') ? collect(session('cart'))->sum('quantity') : 0;
                            @endphp

                            @if ($cartCount > 0)
                                <span class="cart-badge">
                                    {{ $cartCount }}
                                </span>
                            @endif
                        @endauth

                    </a>

                    @guest
                        <a href="{{ route('login') }}" class="login-button">
                            Login
                        </a>
                    @else
                        @if ($menu === 'profile')
                            <button type="button" class="btn-saya" onclick="openCustomerLogoutModal()">

                                <i class="bi bi-box-arrow-right"></i>
                                <span>Logout</span>

                            </button>
                        @else
                            <a href="{{ route('dashboard', ['menu' => 'profile']) }}" class="btn-saya">

                                <i class="bi bi-person-circle"></i>
                                <span>Saya</span>

                            </a>
                        @endif
                    @endguest

                </div>

            </header>

            <!-- ================= CONTENT ================= -->

            <main class="content">

                @if ($menu === 'home')

                    @guest

                        <section class="landing-preview">

                            <div class="landing-content">

                                <div class="landing-badge">
                                    🍕 Fresh • Hot • Delicious
                                </div>

                                <h1 class="landing-title">
                                    Selamat Datang di
                                    <span>PizzaMozza!</span>
                                </h1>

                                <p class="landing-description">
                                    Nikmati pizza lezat dengan bahan berkualitas,
                                    topping melimpah, dan rasa yang bikin ingin pesan lagi.
                                </p>

                                <div class="landing-actions">

                                    <a href="{{ route('products.index') }}" class="btn-primary">
                                        Lihat Produk
                                    </a>

                                    <a href="{{ route('register') }}" class="btn-secondary">
                                        Daftar Sekarang
                                    </a>

                                </div>

                            </div>

                            <div class="landing-visual">
                                🍕
                            </div>

                        </section>
                    @else
                        <h1 class="page-title">
                            Halo, {{ auth()->user()->name }} 👋
                        </h1>

                        <p class="page-subtitle">
                            Selamat datang kembali di PizzaMozza.
                        </p>

                        <section class="dashboard-summary">

                            <div class="summary-card">
                                <div>
                                    <span class="summary-label">Total Pesanan</span>
                                    <div class="summary-value">
                                        {{ $allOrders->count() }}
                                    </div>
                                </div>

                                <div class="summary-icon">
                                    <i class="bi bi-cart-check"></i>
                                </div>
                            </div>

                            <div class="summary-card">
                                <div>
                                    <span class="summary-label">Sedang Diproses</span>
                                    <div class="summary-value">
                                        {{ $processingCount }}
                                    </div>
                                </div>

                                <div class="summary-icon">
                                    <i class="bi bi-clock-history"></i>
                                </div>
                            </div>

                            <div class="summary-card">
                                <div>
                                    <span class="summary-label">Pesanan Berisi Produk</span>

                                    <div class="summary-value">
                                        {{ $allOrders->filter(fn($order) => $order->items && $order->items->isNotEmpty())->count() }}
                                    </div>
                                </div>

                                <div class="summary-icon">
                                    <i class="bi bi-bag-check"></i>
                                </div>
                            </div>

                            <div class="summary-card">
                                <div>
                                    <span class="summary-label">Menunggu Pembayaran</span>
                                    <div class="summary-value">
                                        {{ $pendingCount }}
                                    </div>
                                </div>

                                <div class="summary-icon">
                                    <i class="bi bi-wallet2"></i>
                                </div>
                            </div>

                        </section>

                        <!-- MENU CEPAT -->

                        <section class="section">

                            <div class="section-header">
                                <h2 class="section-title">Menu Cepat</h2>
                            </div>

                            <div class="quick-grid">

                                <a href="{{ route('dashboard') }}?menu=orders" class="quick-card orange">

                                    <div class="quick-icon">
                                        <i class="bi bi-cart-fill"></i>
                                    </div>

                                    <div>
                                        <h3>Pesanan Saya</h3>
                                        <p>Lihat pesanan yang sedang berlangsung.</p>
                                    </div>

                                    <span class="quick-arrow">›</span>

                                </a>

                                <a href="{{ route('dashboard') }}?menu=profile" class="quick-card blue">

                                    <div class="quick-icon">
                                        <i class="bi bi-person-fill"></i>
                                    </div>

                                    <div>
                                        <h3>Akun Saya</h3>
                                        <p>Kelola informasi akun kamu.</p>
                                    </div>

                                    <span class="quick-arrow">›</span>

                                </a>

                                <a href="{{ route('dashboard') }}?menu=profile" class="quick-card green">

                                    <div class="quick-icon">
                                        <i class="bi bi-geo-alt-fill"></i>
                                    </div>

                                    <div>
                                        <h3>Alamat Saya</h3>
                                        <p>Periksa alamat pengiriman.</p>
                                    </div>

                                    <span class="quick-arrow">›</span>

                                </a>

                                <div class="quick-card purple" onclick="openDeliveryModal()" role="button" tabindex="0"
                                    onkeydown="if(event.key==='Enter'||event.key===' ') openDeliveryModal()">

                                    <div class="quick-icon">
                                        <i class="bi bi-scooter"></i>
                                    </div>

                                    <div>
                                        <h3>Info Pengantaran</h3>
                                        <p>Cek area & tarif ongkir delivery.</p>
                                    </div>

                                    <span class="quick-arrow">›</span>

                                </div>

                            </div>

                        </section>

                        <!-- PESANAN TERBARU -->

                        <section class="section">

                            <div class="section-header">

                                <h2 class="section-title">
                                    Pesanan Terbaru
                                </h2>

                                <a href="{{ route('dashboard') }}?menu=orders" class="section-link">
                                    Lihat Semua →
                                </a>

                            </div>

                            <div class="latest-orders-card">

                                <table class="latest-orders-table">

                                    <thead>
                                        <tr>
                                            <th>Produk</th>
                                            <th>Tanggal</th>
                                            <th>Total Pembayaran</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        @forelse($latestOrders as $order)
                                            @php
                                                $firstItem = $order->items->first();
                                                $firstProduct = $firstItem?->product;

                                                $orderImgFile = $firstProduct
                                                    ? ($firstProduct->image ?? $firstProduct->gambar ?? $firstProduct->foto ?? null)
                                                    : null;
                                                $orderImgFile = $orderImgFile ? ltrim($orderImgFile, '/') : null;

                                                $orderCandidates = $orderImgFile ? [
                                                    'storage/' . $orderImgFile,
                                                    'image/' . $orderImgFile,
                                                    'images/' . $orderImgFile,
                                                    'uploads/' . $orderImgFile,
                                                    $orderImgFile,
                                                ] : [];

                                                $resolvedOrderImage = null;
                                                foreach ($orderCandidates as $path) {
                                                    if (file_exists(public_path($path))) {
                                                        $resolvedOrderImage = asset($path);
                                                        break;
                                                    }
                                                }
                                            @endphp

                                            <tr>

                                                <td>
                                                    <div class="order-product">

                                                        @if ($resolvedOrderImage)
                                                            <img src="{{ $resolvedOrderImage }}"
                                                                alt="{{ $firstProduct->name }}"
                                                                onerror="this.style.display='none'; this.insertAdjacentHTML('afterend', '<span style=\'font-size:28px\'>🍕</span>');">
                                                        @else
                                                            <span style="font-size:28px">
                                                                🍕
                                                            </span>
                                                        @endif

                                                        <span>
                                                            {{ $firstProduct?->name ?? 'Pesanan #' . $order->id }}
                                                        </span>

                                                    </div>
                                                </td>

                                                <td>
                                                    {{ $order->created_at?->format('d M Y') ?? '-' }}
                                                </td>

                                                <td>
                                                    Rp {{ number_format($order->total_price ?? 0, 0, ',', '.') }}
                                                </td>

                                                <td>
                                                    <a class="order-action"
                                                        href="{{ route('customer.orders.show', $order->id) }}">
                                                        Lihat Pesanan
                                                    </a>
                                                </td>

                                            </tr>

                                        @empty

                                            <tr>
                                                <td colspan="4" class="order-empty">
                                                    Belum ada pesanan.
                                                </td>
                                            </tr>
                                        @endforelse

                                    </tbody>

                                </table>

                            </div>

                        </section>

                    @endguest

                    <!-- PRODUK BEST SELLER -->

                    <section class="section">

                        <div class="section-header">

                            <h2 class="section-title">
                                Produk Best Seller
                            </h2>

                            <a href="{{ route('products.index') }}" class="section-link">
                                Lihat Semua →
                            </a>

                        </div>

                        @if (isset($products) && $products->count())

                            <div class="product-grid">

                                @foreach ($products as $product)
                                    @php
                                        $imgFile = $product->image ?? $product->gambar ?? $product->foto ?? null;
                                        $imgFile = $imgFile ? ltrim($imgFile, '/') : null;

                                        $candidates = $imgFile ? [
                                            'storage/' . $imgFile,
                                            'image/' . $imgFile,
                                            'images/' . $imgFile,
                                            'uploads/' . $imgFile,
                                            $imgFile,
                                        ] : [];

                                        $resolvedImage = null;
                                        foreach ($candidates as $path) {
                                            if (file_exists(public_path($path))) {
                                                $resolvedImage = asset($path);
                                                break;
                                            }
                                        }

                                        if (!$resolvedImage && $imgFile && str_starts_with($imgFile, 'http')) {
                                            $resolvedImage = $imgFile;
                                        }

                                        $price = $product->variants->min('price') ?? ($product->price ?? 0);
                                    @endphp

                                    <div class="product-card">

                                        <div class="product-image">

                                            <span class="bestseller-badge">
                                                🔥 Best Seller
                                            </span>

                                            @if ($resolvedImage)
                                                <img src="{{ $resolvedImage }}"
                                                    alt="{{ $product->name }}"
                                                    onerror="this.style.display='none'; this.insertAdjacentHTML('afterend', '<div class=\'product-placeholder\'>🍕</div>');">
                                            @else
                                                <div class="product-placeholder">
                                                    🍕
                                                </div>
                                            @endif

                                        </div>

                                        <div class="product-info">

                                            <div class="product-name">
                                                {{ $product->name }}
                                            </div>

                                            <div class="product-price">
                                                Rp {{ number_format($price, 0, ',', '.') }}
                                            </div>

                                            <a href="{{ route('products.show', $product) }}" class="product-button">
                                                Lihat Produk
                                            </a>

                                        </div>

                                    </div>
                                @endforeach

                            </div>
                        @else
                            <div class="empty-state">

                                <div class="empty-icon">🍕</div>

                                <h3>Produk belum tersedia</h3>

                                <p>
                                    Silakan cek halaman produk untuk melihat menu PizzaMozza.
                                </p>

                                <a href="{{ route('products.index') }}" class="btn-primary">
                                    Lihat Produk
                                </a>

                            </div>

                        @endif

                    </section>
                @elseif($menu === 'orders')
                    @auth

                        <h1 class="page-title">Pesanan Saya</h1>

                        <p class="page-subtitle">
                            Lihat status dan riwayat pesanan kamu disini.
                        </p>

                        @if ($allOrders->count())
                            <div class="orders-card">

                                @foreach ($allOrders as $order)
                                    @php
                                        $status = strtolower((string) $order->status);

                                        $statusClass = match ($status) {
                                            'pending' => 'status-pending',
                                            'processing' => 'status-processing',
                                            'shipped' => 'status-shipped',
                                            'completed' => 'status-completed',
                                            'cancelled' => 'status-cancelled',
                                            default => 'status-pending',
                                        };

                                        $statusLabel = match ($status) {
                                            'pending' => 'Menunggu',
                                            'processing' => 'Diproses',
                                            'shipped' => 'Dikirim',
                                            'completed' => 'Selesai',
                                            'cancelled' => 'Dibatalkan',
                                            default => ucfirst($status),
                                        };
                                    @endphp

                                    <a href="{{ route('customer.orders.show', $order->id) }}" class="order-row">

                                        <div>

                                            <div class="order-number">
                                                #{{ $order->id }}
                                            </div>

                                            <div class="order-date">
                                                {{ $order->created_at?->format('d M Y, H:i') ?? '-' }}
                                            </div>

                                        </div>

                                        <div class="order-total">
                                            Rp {{ number_format($order->total_price ?? 0, 0, ',', '.') }}
                                        </div>

                                        <span class="status {{ $statusClass }}">
                                            {{ $statusLabel }}
                                        </span>

                                    </a>
                                @endforeach

                            </div>
                        @else
                            <div class="empty-state">

                                <div class="empty-icon">🛒</div>

                                <h3>Belum ada pesanan</h3>

                                <p>Kamu belum melakukan transaksi.</p>

                                <a href="{{ route('products.index') }}" class="btn-primary">
                                    Mulai Belanja
                                </a>

                            </div>
                        @endif
                    @else
                        <div class="empty-state">

                            <div class="empty-icon">🔐</div>

                            <h3>Silakan Login</h3>

                            <p>Login terlebih dahulu untuk melihat pesanan.</p>

                            <a href="{{ route('login') }}" class="btn-primary">
                                Login
                            </a>

                        </div>

                    @endauth
                @elseif($menu === 'profile')
                    @auth

                        <h1 class="page-title">Akun Saya</h1>

                        <p class="page-subtitle">
                            Informasi akun dan alamat pengiriman kamu.
                        </p>

                        <div class="profile-card">

                            <div class="profile-header">

                                <div class="profile-avatar">

                                    @if (auth()->user()->foto_profile)
                                        <img src="{{ asset('storage/' . auth()->user()->foto_profile) }}"
                                            alt="Foto profil">
                                    @else
                                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                                    @endif

                                </div>

                                <div>

                                    <div class="profile-name">
                                        {{ auth()->user()->name }}
                                    </div>

                                    <div class="profile-email">
                                        {{ auth()->user()->email }}
                                    </div>

                                </div>

                            </div>

                            <div class="profile-grid">

                                <div class="profile-field">

                                    <div class="profile-label">
                                        Nama Lengkap
                                    </div>

                                    <div class="profile-value">
                                        {{ auth()->user()->name }}
                                    </div>

                                </div>

                                <div class="profile-field">

                                    <div class="profile-label">
                                        Email
                                    </div>

                                    <div class="profile-value">
                                        {{ auth()->user()->email }}
                                    </div>

                                </div>

                                <div class="profile-field">

                                    <div class="profile-label">
                                        Nomor Telepon
                                    </div>

                                    <div class="profile-value">
                                        {{ auth()->user()->no_hp ?: '-' }}
                                    </div>

                                </div>

                                <div class="profile-field">

                                    <div class="profile-label">
                                        Role
                                    </div>

                                    <div class="profile-value">
                                        Pelanggan
                                    </div>

                                </div>

                                <div class="profile-field" style="grid-column:1/-1">

                                    <div class="profile-label">
                                        Alamat Pengiriman
                                    </div>

                                    <div class="profile-value">
                                        {{ auth()->user()->address ?: 'Alamat belum diisi.' }}
                                    </div>

                                </div>

                            </div>

                            <div style="display:flex;gap:10px;flex-wrap:wrap;margin-top:24px">

                                <a href="{{ route('profile.edit') }}" class="btn-primary">

                                    <i class="bi bi-pencil-square" style="margin-right: 8px;"></i>

                                    Edit Profile

                                </a>

                                <a href="{{ route('password.reset.form') }}" class="btn-primary">

                                    <i class="bi bi-key" style="margin-right: 8px;"></i>

                                    Reset Password

                                </a>

                                <a href="{{ route('dashboard') }}" class="btn-secondary">

                                    <i class="bi bi-arrow-left" style="margin-right: 8px;"></i>

                                    Kembali ke Menu

                                </a>

                            </div>

                        </div>
                    @else
                        <div class="empty-state">

                            <div class="empty-icon">👤</div>

                            <h3>Belum Login</h3>

                            <p>Silakan login untuk melihat akun kamu.</p>

                            <a href="{{ route('login') }}" class="btn-primary">
                                Login
                            </a>

                        </div>

                    @endauth

                @endif

            </main>

            <footer class="footer">
                © {{ date('Y') }} PizzaMozza. All Rights Reserved.
            </footer>

        </div>

    </div>

    <!-- ================= FORM LOGOUT ================= -->

    @auth
        <form action="{{ route('logout') }}" method="POST" id="customerLogoutForm">
            @csrf
        </form>
    @endauth

    <!-- ================= POPUP LOGOUT PELANGGAN ================= -->

    <div class="logout-modal" id="customerLogoutModal">

        <div class="logout-dialog" role="dialog" aria-modal="true" aria-labelledby="customerLogoutTitle">

            <div class="logout-modal-icon">
                <i class="bi bi-box-arrow-right"></i>
            </div>

            <h3 id="customerLogoutTitle">
                Keluar dari Akun?
            </h3>

            <p>
                Apakah kamu yakin ingin keluar dari akun PizzaMozza?
            </p>

            <div class="logout-modal-actions">

                <button type="button" class="cancel-logout" onclick="closeCustomerLogoutModal()">
                    Batal
                </button>

                <button type="button" class="confirm-logout" onclick="confirmCustomerLogout()">
                    Ya, Keluar
                </button>

            </div>

        </div>

    </div>

    <!-- ================= MODAL INFORMASI PENGANTARAN ================= -->

    <div class="delivery-modal" id="deliveryInfoModal">
        <div class="delivery-dialog" role="dialog" aria-modal="true" aria-labelledby="deliveryModalTitle">
            <button type="button" class="delivery-close-x" onclick="closeDeliveryModal()" aria-label="Tutup">
                <i class="bi bi-x-lg"></i>
            </button>

            <div class="delivery-modal-icon">
                <i class="bi bi-scooter"></i>
            </div>

            <h3 id="deliveryModalTitle">Informasi Pengantaran</h3>
            <p class="delivery-subtitle">
                Ketentuan tarif delivery pesanan PizzaMozza:
            </p>

            <div class="delivery-rates">
                <div class="rate-item free">
                    <div class="rate-badge">GRATIS</div>
                    <div class="rate-detail">
                        <strong>Wilayah Pelaihari & Sekitarnya</strong>
                        <span>Free Ongkir (Rp 0) langsung ke alamatmu.</span>
                    </div>
                </div>

                <div class="rate-item paid">
                    <div class="rate-badge">Rp 10.000</div>
                    <div class="rate-detail">
                        <strong>Di Luar Wilayah Pelaihari</strong>
                        <span>Dikenakan tarif ongkir flat sebesar Rp 10.000.</span>
                    </div>
                </div>
            </div>

            <div class="delivery-note">
                <i class="bi bi-info-circle"></i>
                <span>Pastikan titik & detail alamat di menu <strong>Alamat Saya</strong> sudah benar sebelum checkout.</span>
            </div>

            <button type="button" class="delivery-confirm-btn" onclick="closeDeliveryModal()">
                Mengerti
            </button>
        </div>
    </div>

    <!-- ================= JAVASCRIPT ================= -->

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');

            if (sidebar) {
                sidebar.classList.toggle('open');
            }
        }

        document.addEventListener('click', function(event) {
            const sidebar = document.getElementById('sidebar');
            const menuButton = document.querySelector('.mobile-menu');

            if (
                window.innerWidth <= 800 &&
                sidebar &&
                menuButton &&
                sidebar.classList.contains('open') &&
                !sidebar.contains(event.target) &&
                !menuButton.contains(event.target)
            ) {
                sidebar.classList.remove('open');
            }
        });

        function openCustomerLogoutModal() {
            document.getElementById('customerLogoutModal').classList.add('show');
        }

        function closeCustomerLogoutModal() {
            document.getElementById('customerLogoutModal').classList.remove('show');
        }

        function confirmCustomerLogout() {
            const logoutForm = document.getElementById('customerLogoutForm');

            if (logoutForm) {
                logoutForm.submit();
            }
        }

        const logoutModal = document.getElementById('customerLogoutModal');
        if (logoutModal) {
            logoutModal.addEventListener('click', function(event) {
                if (event.target === this) {
                    closeCustomerLogoutModal();
                }
            });
        }

        function openDeliveryModal() {
            document.getElementById('deliveryInfoModal').classList.add('show');
        }

        function closeDeliveryModal() {
            document.getElementById('deliveryInfoModal').classList.remove('show');
        }

        const deliveryModal = document.getElementById('deliveryInfoModal');
        if (deliveryModal) {
            deliveryModal.addEventListener('click', function(event) {
                if (event.target === this) {
                    closeDeliveryModal();
                }
            });
        }

        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                closeCustomerLogoutModal();
                closeDeliveryModal();
            }
        });
    </script>

</body>

</html>