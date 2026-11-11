<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard Admin - PizzaMozza</title>

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    >

    <link
        rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
    >

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        :root {
            --primary: #941919;
            --primary-dark: #781313;
            --primary-light: #fff0f0;

            --text: #252a34;
            --muted: #858d9b;
            --border: #e9ebef;
            --background: #f5f6f8;
            --white: #ffffff;

            --blue: #4778c7;
            --orange: #bd7935;
            --green: #24945a;

            --sidebar-width: 265px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--background);
            color: var(--text);
            font-size: 13px;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        button,
        input {
            font-family: inherit;
        }

        /* SIDEBAR */

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            width: var(--sidebar-width);
            background: var(--primary);
            color: white;
            z-index: 200;
            display: flex;
            flex-direction: column;
            transition: transform .3s ease;
        }

        .brand {
            height: 76px;
            min-height: 76px;
            padding: 15px 22px;
            display: flex;
            align-items: center;
            gap: 12px;
            border-bottom: 1px solid rgba(255, 255, 255, .15);
        }

        .brand-icon {
            width: 43px;
            height: 43px;
            min-width: 43px;
            border-radius: 50%;
            background: rgba(255, 255, 255, .18);
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 23px;
        }

        .brand h2 {
            font-size: 19px;
            font-weight: 800;
        }

        .brand p {
            margin-top: 4px;
            font-size: 10px;
            opacity: .8;
        }

        .sidebar-menu {
            flex: 1;
            padding: 26px 12px;
            overflow-y: auto;
        }

        .menu-title {
            margin: 0 13px 16px;
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 1px;
            opacity: .7;
        }

        .menu-list {
            list-style: none;
        }

        .menu-item {
            margin-bottom: 8px;
        }

        .menu-link {
            min-height: 46px;
            padding: 0 15px;
            display: flex;
            align-items: center;
            gap: 13px;
            border-radius: 9px;
            color: white;
            font-size: 12px;
            font-weight: 600;
            transition: .2s;
        }

        .menu-link i {
            width: 20px;
            min-width: 20px;
            font-size: 17px;
            text-align: center;
        }

        .menu-link:hover,
        .menu-link.active {
            background: rgba(255, 255, 255, .18);
        }

        .sidebar-bottom {
            padding: 18px 14px;
            border-top: 1px solid rgba(255, 255, 255, .15);
        }

        .admin-profile {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 0 7px;
            margin-bottom: 14px;
        }

        .admin-avatar {
            width: 39px;
            height: 39px;
            min-width: 39px;
            border-radius: 50%;
            background: rgba(255, 255, 255, .18);
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 17px;
        }

        .admin-info strong {
            display: block;
            font-size: 11px;
        }

        .admin-info span {
            display: block;
            margin-top: 4px;
            font-size: 10px;
            opacity: .75;
        }

        .logout-button {
            width: 100%;
            height: 40px;
            border: 0;
            border-radius: 8px;
            background: white;
            color: var(--primary);
            font-size: 12px;
            font-weight: 700;
            cursor: pointer;
        }

        .logout-button:hover {
            background: #ffe8e8;
        }

        /* MAIN WRAPPER */

        .main-wrapper {
            margin-left: var(--sidebar-width);
            min-height: 100vh;
            transition: margin-left .3s ease;
        }

        /* NAVBAR */

        .topbar {
            height: 68px;
            position: sticky;
            top: 0;
            z-index: 100;
            padding: 0 30px;
            background: white;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 24px;
        }

        .topbar-left {
            display: flex;
            align-items: center;
            gap: 17px;
            min-width: 180px;
        }

        .sidebar-toggle {
            width: 34px;
            height: 34px;
            border: none;
            background: transparent;
            color: #626a77;
            border-radius: 7px;
            cursor: pointer;
            font-size: 19px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .sidebar-toggle:hover {
            background: #f2f3f5;
            color: var(--primary);
        }

        .topbar-title {
            font-size: 14px;
            font-weight: 750;
            color: #272c35;
        }

        /* SEARCH */

        .topbar-search {
            flex: 1;
            max-width: 430px;
            position: relative;
            margin: 0 auto;
        }

        .topbar-search > i {
            position: absolute;
            left: 13px;
            top: 50%;
            transform: translateY(-50%);
            color: #9299a5;
            font-size: 14px;
            pointer-events: none;
        }

        .topbar-search input {
            width: 100%;
            height: 38px;
            padding: 0 38px 0 37px;
            border: 1px solid #e8e9ed;
            border-radius: 8px;
            background: #fafafa;
            outline: none;
            font-size: 11px;
            color: var(--text);
            transition: .2s;
        }

        .topbar-search input:focus {
            border-color: var(--primary);
            background: white;
            box-shadow: 0 0 0 3px rgba(148, 25, 25, .06);
        }

        .topbar-search input::placeholder {
            color: #a1a7b1;
        }

        .clear-search {
            position: absolute;
            right: 9px;
            top: 50%;
            transform: translateY(-50%);
            width: 23px;
            height: 23px;
            border: none;
            border-radius: 50%;
            background: transparent;
            color: #9299a5;
            cursor: pointer;
            display: none;
            align-items: center;
            justify-content: center;
        }

        .clear-search.show {
            display: flex;
        }

        .search-results {
            display: none;
            position: absolute;
            top: calc(100% + 7px);
            left: 0;
            right: 0;
            background: white;
            border: 1px solid var(--border);
            border-radius: 9px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, .10);
            overflow: hidden;
            z-index: 500;
            max-height: 320px;
            overflow-y: auto;
        }

        .search-results.show {
            display: block;
        }

        .search-result-item {
            width: 100%;
            padding: 12px 14px;
            display: flex;
            align-items: center;
            gap: 11px;
            background: white;
            border: none;
            border-bottom: 1px solid #f0f0f0;
            text-align: left;
            cursor: pointer;
            transition: .2s;
        }

        .search-result-item:last-child {
            border-bottom: none;
        }

        .search-result-item:hover {
            background: var(--primary-light);
        }

        .search-result-item i {
            color: var(--primary);
            font-size: 16px;
        }

        .search-result-item strong {
            display: block;
            font-size: 11px;
            color: var(--text);
        }

        .search-result-item span {
            display: block;
            margin-top: 4px;
            font-size: 9px;
            color: var(--muted);
        }

        .search-empty {
            padding: 15px;
            color: var(--muted);
            font-size: 11px;
            text-align: center;
        }

        /* PROFIL ADMIN */

        .topbar-right {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .notification-wrapper {
            position: relative;
        }

        .notification-button {
            position: relative;
            width: 34px;
            height: 34px;
            border: 0;
            border-radius: 50%;
            background: transparent;
            color: #505968;
            font-size: 18px;
            cursor: pointer;
        }

        .notification-button:hover {
            background: #f5f5f5;
        }

        .notification-dot {
            position: absolute;
            top: 6px;
            right: 6px;
            width: 7px;
            height: 7px;
            background: #ed4444;
            border: 1px solid white;
            border-radius: 50%;
        }

        .topbar-admin {
            display: flex;
            align-items: center;
            gap: 12px;
            text-align: right;
        }

        .topbar-admin strong {
            display: block;
            font-size: 12px;
            font-weight: 700;
            color: #303540;
        }

        .topbar-admin span {
            display: block;
            margin-top: 4px;
            color: var(--muted);
            font-size: 10px;
        }

        .topbar-avatar {
            width: 40px;
            height: 40px;
            min-width: 40px;
            border-radius: 50%;
            background: var(--primary-light);
            color: var(--primary);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
        }

        .notification-menu {
            display: none;
            position: absolute;
            top: calc(100% + 12px);
            right: 0;
            width: 260px;
            background: white;
            border: 1px solid var(--border);
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, .12);
            z-index: 300;
        }

        .notification-menu.show {
            display: block;
        }

        .notification-heading {
            padding: 13px;
            font-size: 12px;
            font-weight: 800;
            border-bottom: 1px solid var(--border);
        }

        .notification-empty {
            padding: 22px 12px;
            text-align: center;
            color: var(--muted);
            font-size: 11px;
        }

        /* CONTENT */

        .content {
            width: 100%;
            max-width: 1600px;
            margin: 0 auto;
            padding: 30px 32px 45px;
        }

        .page-heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-bottom: 24px;
        }

        .page-heading h1 {
            font-size: 24px;
            font-weight: 800;
            letter-spacing: -.5px;
        }

        .page-heading p {
            margin-top: 7px;
            color: var(--muted);
            font-size: 12px;
        }

        .date-label {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 11px 14px;
            background: white;
            border: 1px solid var(--border);
            border-radius: 9px;
            color: var(--muted);
            font-size: 10px;
            font-weight: 600;
        }

        /* BANNER */

        .welcome-banner {
            position: relative;
            isolation: isolate;
            overflow: hidden;
            min-height: 150px;
            padding: 25px 30px;
            margin-bottom: 23px;
            border-radius: 13px;
            background: var(--primary);
            color: white;
            box-shadow: 0 9px 24px rgba(148, 25, 25, .14);
        }

        .welcome-banner::before {
            content: "";
            position: absolute;
            inset: 0;
            z-index: -1;
            background:
                linear-gradient(
                    90deg,
                    #941919 0%,
                    rgba(148, 25, 25, .97) 34%,
                    rgba(148, 25, 25, .65) 55%,
                    rgba(120, 19, 19, .08) 100%
                ),
                url("{{ asset('image/pizza-banner.jpeg') }}");

            background-size: cover;
            background-position: center 55%;
            background-repeat: no-repeat;
        }

        .welcome-content {
            position: relative;
            z-index: 1;
        }

        .welcome-content span {
            display: block;
            margin-bottom: 10px;
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 1.2px;
            opacity: .85;
        }

        .welcome-content h2 {
            font-size: 23px;
            font-weight: 800;
            margin-bottom: 8px;
        }

        .welcome-content p {
            font-size: 12px;
            line-height: 1.6;
        }

        /* STATISTICS */

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 17px;
            margin-bottom: 24px;
        }

        .stat-card {
            min-width: 0;
            min-height: 145px;
            padding: 16px 17px;
            border: 1px solid rgba(0, 0, 0, .035);
            border-radius: 15px;
            box-shadow: 0 5px 18px rgba(30, 35, 50, .045);
            transition: .25s;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 25px rgba(30, 35, 50, .10);
        }

        .stat-card.red {
            background: linear-gradient(135deg, #fff 15%, #fff0f0);
        }

        .stat-card.blue {
            background: linear-gradient(135deg, #fff 15%, #eef5ff);
        }

        .stat-card.orange {
            background: linear-gradient(135deg, #fff 15%, #fff6e9);
        }

        .stat-card.green {
            background: linear-gradient(135deg, #fff 15%, #eaf8ef);
        }

        .stat-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 8px;
        }

        .stat-heading {
            display: flex;
            align-items: center;
            gap: 9px;
        }

        .stat-icon {
            width: 38px;
            height: 38px;
            min-width: 38px;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 50%;
            font-size: 17px;
        }

        .red .stat-icon {
            background: #fce0e0;
            color: #b52b2b;
        }

        .blue .stat-icon {
            background: #dceaff;
            color: #3976c9;
        }

        .orange .stat-icon {
            background: #ffebd2;
            color: #d18435;
        }

        .green .stat-icon {
            background: #d9f1e2;
            color: #24945a;
        }

        .stat-title {
            color: #596273;
            font-size: 11px;
            font-weight: 700;
        }

        .stat-number {
            margin-top: 12px;
            font-size: 24px;
            font-weight: 800;
            letter-spacing: -.7px;
            color: #252a34;
            overflow-wrap: anywhere;
        }

        .stat-description {
            margin-top: 8px;
            color: #818a98;
            font-size: 9px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .stat-sparkline {
            width: 58px;
            height: 31px;
            flex-shrink: 0;
        }

        .stat-sparkline svg {
            width: 100%;
            height: 100%;
        }

        .stat-sparkline polyline {
            fill: none;
            stroke: currentColor;
            stroke-width: 2.5;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        .red .stat-sparkline {
            color: #c63c3c;
        }

        .blue .stat-sparkline {
            color: #3976c9;
        }

        .orange .stat-sparkline {
            color: #d18435;
        }

        .green .stat-sparkline {
            color: #24945a;
        }

        /* DASHBOARD GRID */

        .dashboard-grid {
            display: grid;
            grid-template-columns: minmax(0, 1.6fr) minmax(280px, .9fr);
            gap: 19px;
            margin-bottom: 22px;
            align-items: start;
        }

        .panel {
            background: white;
            border: 1px solid var(--border);
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 5px 18px rgba(0, 0, 0, .035);
        }

        .panel-header {
            min-height: 68px;
            padding: 17px 20px;
            border-bottom: 1px solid #edf0f3;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
        }

        .panel-header h3 {
            font-size: 13px;
            font-weight: 800;
        }

        .panel-header p {
            margin-top: 5px;
            color: var(--muted);
            font-size: 10px;
        }

        .panel-link {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            color: var(--primary);
            font-size: 10px;
            font-weight: 700;
        }

        .panel-link:hover {
            color: var(--primary-dark);
        }

        .panel-body {
            padding: 20px;
        }

        /* CHART */

        .chart-periods {
            display: flex;
            gap: 4px;
            padding: 4px;
            border-radius: 8px;
            background: #fff0f0;
        }

        .chart-period {
            border: 0;
            border-radius: 6px;
            padding: 7px 9px;
            background: transparent;
            color: var(--primary);
            font-size: 9px;
            font-weight: 700;
            cursor: pointer;
        }

        .chart-period.active,
        .chart-period:hover {
            background: var(--primary);
            color: white;
        }

        .chart-container {
            position: relative;
            height: 255px;
        }

        /* ORDER STATUS */

        .status-list {
            padding: 8px 18px 14px;
        }

        .status-item {
            min-height: 51px;
            padding: 0 8px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid #edf0f3;
            border-radius: 7px;
            transition: .2s;
        }

        .status-item:hover {
            background: var(--primary-light);
            padding-left: 13px;
        }

        .status-item:last-child {
            border-bottom: none;
        }

        .status-name {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 11px;
            font-weight: 600;
        }

        .status-dot {
            width: 9px;
            height: 9px;
            border-radius: 50%;
        }

        .dot-pending {
            background: #e5a23d;
        }

        .dot-processing {
            background: #4778c7;
        }

        .dot-shipped {
            background: #8b63c7;
        }

        .dot-completed {
            background: #24945a;
        }

        .dot-cancelled {
            background: #d84a4a;
        }

        .status-count {
            font-size: 12px;
            font-weight: 800;
        }

        /* TABLE */

        .table-wrapper {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            white-space: nowrap;
        }

        th {
            padding: 13px 18px;
            background: #fafafa;
            color: var(--muted);
            text-align: left;
            font-size: 9px;
            font-weight: 700;
        }

        td {
            padding: 14px 18px;
            border-bottom: 1px solid #edf0f3;
            font-size: 11px;
        }

        tbody tr:hover {
            background: #fff8f8;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        .order-code {
            color: var(--primary);
            font-weight: 700;
        }

        .customer-name {
            font-weight: 700;
        }

        .badge {
            display: inline-flex;
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 9px;
            font-weight: 700;
        }

        .badge-pending {
            background: #fff5e5;
            color: #bd7935;
        }

        .badge-processing {
            background: #edf4ff;
            color: #4778c7;
        }

        .badge-shipped {
            background: #f3edff;
            color: #8054bd;
        }

        .badge-completed {
            background: #eaf8f0;
            color: #24945a;
        }

        .badge-cancelled {
            background: #fff0f0;
            color: #c83d3d;
        }

        .empty-data {
            padding: 25px;
            text-align: center;
            color: var(--muted);
            font-size: 11px;
        }

        /* PRODUCTS */

        .product-list {
            padding: 0 18px;
        }

        .product-row {
            min-height: 68px;
            display: flex;
            align-items: center;
            gap: 11px;
            border-bottom: 1px solid #edf0f3;
            transition: .2s;
        }

        .product-row:last-child {
            border-bottom: none;
        }

        .product-row:hover {
            background: #fff8f8;
        }

        .product-thumbnail {
            width: 42px;
            height: 42px;
            min-width: 42px;
            border-radius: 9px;
            background: var(--primary-light);
            color: var(--primary);
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            font-size: 19px;
        }

        .product-thumbnail img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .product-data {
            flex: 1;
            min-width: 0;
        }

        .product-data strong {
            display: block;
            font-size: 10px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .product-data span {
            display: block;
            margin-top: 5px;
            color: var(--muted);
            font-size: 9px;
        }

        .product-sold {
            color: var(--primary);
            font-size: 10px;
            font-weight: 700;
        }

        /* SEARCH FILTER */

        .search-hidden {
            display: none !important;
        }

        .search-no-result {
            display: none;
            padding: 20px;
            text-align: center;
            color: var(--muted);
            font-size: 11px;
        }

        .search-no-result.show {
            display: block;
        }

        .search-highlight {
            outline: 2px solid var(--primary);
            outline-offset: -2px;
            border-radius: 7px;
        }

        /* LOGOUT MODAL */

        .logout-modal {
            position: fixed;
            inset: 0;
            z-index: 999;
            display: none;
            align-items: center;
            justify-content: center;
            padding: 20px;
            background: rgba(0, 0, 0, .45);
        }

        .logout-modal.show {
            display: flex;
        }

        .logout-dialog {
            width: 100%;
            max-width: 370px;
            padding: 27px;
            border-radius: 14px;
            background: white;
            text-align: center;
        }

        .logout-modal-icon {
            width: 52px;
            height: 52px;
            margin: 0 auto 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: var(--primary-light);
            color: var(--primary);
            font-size: 21px;
        }

        .logout-dialog h3 {
            margin-bottom: 9px;
            font-size: 17px;
        }

        .logout-dialog p {
            margin-bottom: 20px;
            color: var(--muted);
            font-size: 11px;
            line-height: 1.6;
        }

        .logout-modal-actions {
            display: flex;
            gap: 10px;
        }

        .logout-modal-actions button {
            flex: 1;
            padding: 11px;
            border: none;
            border-radius: 8px;
            font-size: 11px;
            font-weight: 700;
            cursor: pointer;
        }

        .cancel-logout {
            background: #f0f1f3;
            color: #555;
        }

        .confirm-logout {
            background: var(--primary);
            color: white;
        }

        /* COLLAPSED SIDEBAR */

        body.sidebar-collapsed .sidebar {
            transform: translateX(-100%);
        }

        body.sidebar-collapsed .main-wrapper {
            margin-left: 0;
        }

        /* RESPONSIVE */

        @media (max-width: 1100px) {
            .stats-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .dashboard-grid {
                grid-template-columns: 1fr;
            }

            .content {
                padding: 25px 22px 40px;
            }

            .topbar {
                padding: 0 22px;
            }
        }

        @media (max-width: 650px) {
            .topbar {
                height: 62px;
                padding: 0 12px;
                gap: 8px;
            }

            .topbar-left {
                min-width: auto;
                gap: 8px;
            }

            .topbar-title {
                font-size: 12px;
            }

            .topbar-search {
                max-width: none;
            }

            .topbar-search input {
                font-size: 9px;
                padding-left: 30px;
            }

            .topbar-search > i {
                left: 10px;
            }

            .topbar-right {
                gap: 5px;
            }

            .topbar-admin {
                gap: 7px;
            }

            .topbar-admin strong {
                font-size: 9px;
            }

            .topbar-admin span {
                font-size: 8px;
            }

            .topbar-avatar {
                width: 32px;
                height: 32px;
                min-width: 32px;
                font-size: 15px;
            }

            .content {
                padding: 20px 14px 30px;
            }

            .page-heading {
                align-items: flex-start;
                flex-direction: column;
            }

            .welcome-banner {
                padding: 22px;
            }

            .welcome-content h2 {
                font-size: 18px;
            }

            .chart-periods {
                flex-wrap: wrap;
            }
        }

        @media (max-width: 450px) {
            .stats-grid {
                grid-template-columns: 1fr;
            }

            .topbar-title {
                display: none;
            }

            .topbar-search {
                max-width: 150px;
            }

            .topbar-admin > div:first-child {
                display: none;
            }
        }
    </style>
</head>

<body>

    {{-- SIDEBAR --}}

    <aside class="sidebar">

        <div class="brand">
            <div class="brand-icon">🍕</div>

            <div>
                <h2>PizzaMozza</h2>
                <p>Admin Dashboard</p>
            </div>
        </div>

        <nav class="sidebar-menu">

            <p class="menu-title">MAIN MENU</p>

            <ul class="menu-list">

                <li class="menu-item">
                    <a
                        href="{{ route('admin.dashboard') }}"
                        class="menu-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"
                    >
                        <i class="bi bi-grid-1x2"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="menu-item">
                    <a
                        href="{{ route('admin.employees.index') }}"
                        class="menu-link {{ request()->routeIs('admin.employees.*') ? 'active' : '' }}"
                    >
                        <i class="bi bi-people"></i>
                        <span>Data Karyawan</span>
                    </a>
                </li>

                <li class="menu-item">
                    <a
                        href="{{ route('admin.customers.index') }}"
                        class="menu-link {{ request()->routeIs('admin.customers.*') ? 'active' : '' }}"
                    >
                        <i class="bi bi-person-vcard"></i>
                        <span>Data Pelanggan</span>
                    </a>
                </li>

                <li class="menu-item">
                    <a
                        href="{{ route('admin.products.index') }}"
                        class="menu-link {{ request()->routeIs('admin.products.*') ? 'active' : '' }}"
                    >
                        <i class="bi bi-box-seam"></i>
                        <span>Data Produk</span>
                    </a>
                </li>

                <li class="menu-item">
                    <a
                        href="{{ route('admin.orders.index') }}"
                        class="menu-link {{ request()->routeIs('admin.orders.*') ? 'active' : '' }}"
                    >
                        <i class="bi bi-receipt"></i>
                        <span>Pesanan</span>
                    </a>
                </li>

                <li class="menu-item">
                    <a
                        href="{{ url('/admin/laporan-penjualan') }}"
                        class="menu-link {{ request()->is('admin/laporan-penjualan*') ? 'active' : '' }}"
                    >
                        <i class="bi bi-bar-chart-line"></i>
                        <span>Laporan Penjualan</span>
                    </a>
                </li>

            </ul>

        </nav>

        <div class="sidebar-bottom">

            <div class="admin-profile">

                <div class="admin-avatar">
                    <i class="bi bi-person"></i>
                </div>

                <div class="admin-info">
                    <strong>{{ auth()->user()->name ?? 'Admin PizzaMozza' }}</strong>
                    <span>Administrator</span>
                </div>

            </div>

            <button
                type="button"
                class="logout-button"
                onclick="openLogoutModal()"
            >
                <i class="bi bi-box-arrow-right"></i>
                Keluar
            </button>

        </div>

    </aside>

    {{-- MAIN WRAPPER --}}

    <div class="main-wrapper">

        {{-- NAVBAR --}}

        <header class="topbar">

            <div class="topbar-left">

                <button
                    type="button"
                    class="sidebar-toggle"
                    onclick="toggleSidebar()"
                >
                    <i class="bi bi-list"></i>
                </button>

                <div class="topbar-title">
                    Dashboard
                </div>

            </div>

            {{-- SEARCH --}}

            <div class="topbar-search">

                <i class="bi bi-search"></i>

                <input
                    type="search"
                    id="dashboardSearch"
                    placeholder="Cari produk, pesanan, atau pelanggan..."
                    autocomplete="off"
                >

                <button
                    type="button"
                    class="clear-search"
                    id="clearSearch"
                >
                    <i class="bi bi-x-lg"></i>
                </button>

                <div
                    class="search-results"
                    id="searchResults"
                ></div>

            </div>

            {{-- NAVBAR RIGHT --}}

            <div class="topbar-right">

                <div class="notification-wrapper">

                    <button
                        type="button"
                        class="notification-button"
                        onclick="toggleNotification()"
                    >
                        <i class="bi bi-bell"></i>
                        <span class="notification-dot"></span>
                    </button>

                    <div
                        class="notification-menu"
                        id="notificationMenu"
                    >
                        <div class="notification-heading">
                            Notifikasi
                        </div>

                        <div class="notification-empty">
                            <i
                                class="bi bi-bell-slash"
                                style="font-size:22px;display:block;margin-bottom:8px;"
                            ></i>

                            Belum ada notifikasi baru.
                        </div>
                    </div>

                </div>

                <div class="topbar-admin">

                    <div>
                        <strong>
                            {{ auth()->user()->name ?? 'Admin PizzaMozza' }}
                        </strong>

                        <span>Administrator</span>
                    </div>

                    <div class="topbar-avatar">
                        <i class="bi bi-person"></i>
                    </div>

                </div>

            </div>

        </header>

        {{-- CONTENT --}}

        <main class="content">

            <div class="page-heading">

                <div>
                    <h1>Dashboard</h1>
                    <p>Ringkasan aktivitas dan operasional PizzaMozza.</p>
                </div>

                <div class="date-label">
                    <i class="bi bi-calendar3"></i>
                    {{ now()->translatedFormat('d F Y') }}
                </div>

            </div>

            {{-- WELCOME BANNER --}}

            <section class="welcome-banner">

                <div class="welcome-content">
                    <span>WELCOME BACK, ADMIN</span>

                    <h2>Selamat Datang di PizzaMozza!</h2>

                    <p>
                        Pantau dan kelola seluruh aktivitas bisnis PizzaMozza dengan mudah.
                    </p>
                </div>

            </section>

            {{-- STATISTIK --}}

            <section class="stats-grid">

                <a
                    href="{{ url('/admin/laporan-penjualan') }}"
                    class="stat-card red"
                >

                    <div class="stat-top">

                        <div class="stat-heading">

                            <div class="stat-icon">
                                <i class="bi bi-currency-dollar"></i>
                            </div>

                            <span class="stat-title">
                                Total Penjualan
                            </span>

                        </div>

                        <div class="stat-sparkline">
                            <svg viewBox="0 0 70 35">
                                <polyline points="2,29 13,24 23,26 34,15 45,20 56,8 68,3"/>
                            </svg>
                        </div>

                    </div>

                    <div class="stat-number">
                        Rp {{ number_format($totalOmzet, 0, ',', '.') }}
                    </div>

                    <p class="stat-description">
                        <i class="bi bi-check-circle-fill"></i>
                        Total pembayaran berhasil
                    </p>

                </a>

                <a
                    href="{{ route('admin.orders.index') }}"
                    class="stat-card blue"
                >

                    <div class="stat-top">

                        <div class="stat-heading">

                            <div class="stat-icon">
                                <i class="bi bi-receipt"></i>
                            </div>

                            <span class="stat-title">
                                Total Pesanan
                            </span>

                        </div>

                        <div class="stat-sparkline">
                            <svg viewBox="0 0 70 35">
                                <polyline points="2,27 13,21 23,24 34,12 45,17 56,9 68,4"/>
                            </svg>
                        </div>

                    </div>

                    <div class="stat-number">
                        {{ number_format($totalPesanan) }}
                    </div>

                    <p class="stat-description">
                        <i class="bi bi-bag-check-fill"></i>
                        Seluruh pesanan masuk
                    </p>

                </a>

                <a
                    href="{{ route('admin.customers.index') }}"
                    class="stat-card orange"
                >

                    <div class="stat-top">

                        <div class="stat-heading">

                            <div class="stat-icon">
                                <i class="bi bi-people-fill"></i>
                            </div>

                            <span class="stat-title">
                                Total Pelanggan
                            </span>

                        </div>

                        <div class="stat-sparkline">
                            <svg viewBox="0 0 70 35">
                                <polyline points="2,28 13,25 23,17 34,21 45,12 56,14 68,4"/>
                            </svg>
                        </div>

                    </div>

                    <div class="stat-number">
                        {{ number_format($totalPelanggan) }}
                    </div>

                    <p class="stat-description">
                        <i class="bi bi-person-check-fill"></i>
                        Pelanggan terdaftar
                    </p>

                </a>

                <a
                    href="{{ route('admin.products.index') }}"
                    class="stat-card green"
                >

                    <div class="stat-top">

                        <div class="stat-heading">

                            <div class="stat-icon">
                                <i class="bi bi-box-seam-fill"></i>
                            </div>

                            <span class="stat-title">
                                Total Produk
                            </span>

                        </div>

                        <div class="stat-sparkline">
                            <svg viewBox="0 0 70 35">
                                <polyline points="2,26 13,20 23,23 34,14 45,17 56,7 68,3"/>
                            </svg>
                        </div>

                    </div>

                    <div class="stat-number">
                        {{ number_format($totalProduk) }}
                    </div>

                    <p class="stat-description">
                        <i class="bi bi-boxes"></i>
                        {{ $readyStock }} produk tersedia
                    </p>

                </a>

            </section>

            {{-- GRAFIK DAN STATUS PESANAN --}}

            <section class="dashboard-grid">

                <div class="panel">

                    <div class="panel-header">

                        <div>
                            <h3>Grafik Penjualan</h3>

                            <p id="chartDescription">
                                Omzet pembayaran berhasil selama 7 hari terakhir
                            </p>
                        </div>

                        <div class="chart-periods">

                            <button
                                class="chart-period active"
                                type="button"
                                data-period="7"
                            >
                                7 Hari
                            </button>

                            <button
                                class="chart-period"
                                type="button"
                                data-period="30"
                            >
                                30 Hari
                            </button>

                            <button
                                class="chart-period"
                                type="button"
                                data-period="365"
                            >
                                Tahunan
                            </button>

                        </div>

                    </div>

                    <div class="panel-body">

                        <div class="chart-container">
                            <canvas id="salesChart"></canvas>
                        </div>

                    </div>

                </div>

                {{-- STATUS PESANAN --}}

                <div class="panel">

                    <div class="panel-header">

                        <div>
                            <h3>Status Pesanan</h3>
                            <p>Ringkasan status seluruh pesanan</p>
                        </div>

                    </div>

                    <div class="status-list">

                        <a
                            href="{{ route('admin.orders.index') }}"
                            class="status-item"
                        >
                            <div class="status-name">
                                <span class="status-dot dot-pending"></span>
                                Menunggu
                            </div>

                            <span class="status-count">
                                {{ $pesananPending }}
                            </span>
                        </a>

                        <a
                            href="{{ route('admin.orders.index') }}"
                            class="status-item"
                        >
                            <div class="status-name">
                                <span class="status-dot dot-processing"></span>
                                Diproses
                            </div>

                            <span class="status-count">
                                {{ $pesananProcessing }}
                            </span>
                        </a>

                        <a
                            href="{{ route('admin.orders.index') }}"
                            class="status-item"
                        >
                            <div class="status-name">
                                <span class="status-dot dot-shipped"></span>
                                Dikirim
                            </div>

                            <span class="status-count">
                                {{ $pesananShipped }}
                            </span>
                        </a>

                        <a
                            href="{{ route('admin.orders.index') }}"
                            class="status-item"
                        >
                            <div class="status-name">
                                <span class="status-dot dot-completed"></span>
                                Selesai
                            </div>

                            <span class="status-count">
                                {{ $pesananSelesai }}
                            </span>
                        </a>

                        <a
                            href="{{ route('admin.orders.index') }}"
                            class="status-item"
                        >
                            <div class="status-name">
                                <span class="status-dot dot-cancelled"></span>
                                Dibatalkan
                            </div>

                            <span class="status-count">
                                {{ $pesananDibatalkan }}
                            </span>
                        </a>

                    </div>

                </div>

            </section>

            {{-- PESANAN TERBARU --}}

            <section
                class="panel"
                style="margin-bottom:22px;"
            >

                <div class="panel-header">

                    <div>
                        <h3>Pesanan Terbaru</h3>
                        <p>Daftar lima pesanan terakhir yang masuk</p>
                    </div>

                    <a
                        href="{{ route('admin.orders.index') }}"
                        class="panel-link"
                    >
                        Lihat Semua
                        <i class="bi bi-arrow-right"></i>
                    </a>

                </div>

                <div class="table-wrapper">

                    <table>

                        <thead>
                            <tr>
                                <th>ID Pesanan</th>
                                <th>Pelanggan</th>
                                <th>Tanggal</th>
                                <th>Total</th>
                                <th>Status</th>
                            </tr>
                        </thead>

                        <tbody id="orderTableBody">

                            @forelse ($pesananTerbaru as $order)

                                @php
                                    $status = strtolower($order->status ?? 'pending');

                                    $statusClass = match ($status) {
                                        'pending' => 'badge-pending',
                                        'processing' => 'badge-processing',
                                        'shipped' => 'badge-shipped',
                                        'completed' => 'badge-completed',
                                        'cancelled' => 'badge-cancelled',
                                        default => 'badge-pending',
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

                                <tr class="searchable-row">

                                    <td class="order-code">
                                        #{{ $order->id }}
                                    </td>

                                    <td class="customer-name">
                                        {{ $order->user->name ?? 'Pelanggan' }}
                                    </td>

                                    <td>
                                        {{ $order->created_at?->format('d/m/Y') }}
                                    </td>

                                    <td>
                                        Rp {{ number_format($order->total_price, 0, ',', '.') }}
                                    </td>

                                    <td>
                                        <span class="badge {{ $statusClass }}">
                                            {{ $statusLabel }}
                                        </span>
                                    </td>

                                </tr>

                            @empty

                                <tr>
                                    <td colspan="5" class="empty-data">
                                        Belum ada pesanan.
                                    </td>
                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                    <div
                        class="search-no-result"
                        id="orderNoResult"
                    >
                        Pesanan tidak ditemukan.
                    </div>

                </div>

            </section>

            {{-- PRODUK TERLARIS DAN PRODUK TERBARU --}}

            <section class="dashboard-grid">

                {{-- PRODUK TERLARIS --}}

                <div class="panel">

                    <div class="panel-header">

                        <div>
                            <h3>Produk Terlaris</h3>
                            <p>Produk dengan jumlah penjualan terbanyak</p>
                        </div>

                        <i
                            class="bi bi-trophy"
                            style="font-size:18px;color:var(--primary);"
                        ></i>

                    </div>

                    <div
                        class="product-list"
                        id="bestSellerList"
                    >

                        @forelse (($produkTerlaris ?? collect()) as $item)

                            <a
                                href="{{ route('admin.products.index') }}"
                                class="product-row searchable-product"
                            >

                                <div class="product-thumbnail">

                                    @if ($item->product?->image)

                                        <img
                                            src="{{ asset('image/' . $item->product->image) }}"
                                            alt="{{ $item->product->name }}"
                                            onerror="this.style.display='none'"
                                        >

                                    @else

                                        <i class="bi bi-box-seam"></i>

                                    @endif

                                </div>

                                <div class="product-data">

                                    <strong>
                                        {{ $item->product->name ?? 'Produk tidak ditemukan' }}
                                    </strong>

                                    <span>Produk terjual</span>

                                </div>

                                <span class="product-sold">
                                    {{ $item->total_terjual }} pcs
                                </span>

                            </a>

                        @empty

                            <div class="empty-data">
                                Belum ada data penjualan produk.
                            </div>

                        @endforelse

                    </div>

                    <div
                        class="search-no-result"
                        id="bestSellerNoResult"
                    >
                        Produk tidak ditemukan.
                    </div>

                </div>

                {{-- PRODUK TERBARU --}}

                <div class="panel">

                    <div class="panel-header">

                        <div>
                            <h3>Produk Terbaru</h3>
                            <p>Menu yang terakhir ditambahkan</p>
                        </div>

                        <a
                            href="{{ route('admin.products.index') }}"
                            class="panel-link"
                        >
                            Lihat Semua
                            <i class="bi bi-arrow-right"></i>
                        </a>

                    </div>

                    <div
                        class="product-list"
                        id="latestProductList"
                    >

                        @forelse ($produkTerbaru as $product)

                            @php
                                $variant = $product->variants->first();
                                $price = $variant?->price ?? $product->price ?? 0;
                            @endphp

                            <a
                                href="{{ route('admin.products.index') }}"
                                class="product-row searchable-product"
                            >

                                <div class="product-thumbnail">

                                    @if ($product->image)

                                        <img
                                            src="{{ asset('image/' . $product->image) }}"
                                            alt="{{ $product->name }}"
                                            onerror="this.style.display='none'"
                                        >

                                    @else

                                        <i class="bi bi-box-seam"></i>

                                    @endif

                                </div>

                                <div class="product-data">

                                    <strong>
                                        {{ $product->name }}
                                    </strong>

                                    <span>
                                        {{ $product->category ?? 'Pizza' }}
                                    </span>

                                </div>

                                <span class="product-sold">
                                    Rp {{ number_format($price, 0, ',', '.') }}
                                </span>

                            </a>

                        @empty

                            <div class="empty-data">
                                Belum ada produk.
                            </div>

                        @endforelse

                    </div>

                    <div
                        class="search-no-result"
                        id="latestProductNoResult"
                    >
                        Produk tidak ditemukan.
                    </div>

                </div>

            </section>

        </main>

    </div>

    {{-- MODAL LOGOUT --}}

    <div
        class="logout-modal"
        id="logoutModal"
    >

        <div class="logout-dialog">

            <div class="logout-modal-icon">
                <i class="bi bi-box-arrow-right"></i>
            </div>

            <h3>Keluar dari Akun?</h3>

            <p>
                Apakah kamu yakin ingin keluar dari dashboard admin PizzaMozza?
            </p>

            <div class="logout-modal-actions">

                <button
                    type="button"
                    class="cancel-logout"
                    onclick="closeLogoutModal()"
                >
                    Batal
                </button>

                <button
                    type="button"
                    class="confirm-logout"
                    onclick="confirmLogout()"
                >
                    Ya, Keluar
                </button>

            </div>

        </div>

    </div>

    {{-- FORM LOGOUT --}}

    <form
        id="logoutForm"
        action="{{ route('logout') }}"
        method="POST"
        style="display:none;"
    >
        @csrf
    </form>

    {{-- JAVASCRIPT --}}

    <script>
        /* SIDEBAR */

        function toggleSidebar() {
            document.body.classList.toggle('sidebar-collapsed');

            localStorage.setItem(
                'pizzamozza-sidebar',
                document.body.classList.contains('sidebar-collapsed')
                    ? 'closed'
                    : 'open'
            );
        }


        /* NOTIFICATION */

        function toggleNotification() {
            document.getElementById('notificationMenu')
                .classList.toggle('show');
        }

        document.addEventListener('click', function (event) {
            const notification = document.querySelector('.notification-wrapper');

            if (notification && !notification.contains(event.target)) {
                document.getElementById('notificationMenu')
                    .classList.remove('show');
            }
        });


        /* SEARCH */

        const searchInput = document.getElementById('dashboardSearch');
        const clearSearch = document.getElementById('clearSearch');
        const searchResults = document.getElementById('searchResults');

        function filterDashboard() {
            const keyword = searchInput.value.toLowerCase().trim();

            clearSearch.classList.toggle('show', keyword.length > 0);

            searchResults.innerHTML = '';
            searchResults.classList.remove('show');

            document.querySelectorAll('.search-no-result').forEach(item => {
                item.classList.remove('show');
            });

            const results = [];

            const searchableElements = document.querySelectorAll(
                '.searchable-row, .searchable-product'
            );

            searchableElements.forEach(element => {
                const text = element.textContent.toLowerCase();

                const match = keyword !== '' && text.includes(keyword);

                element.classList.toggle(
                    'search-hidden',
                    keyword !== '' && !match
                );

                element.classList.remove('search-highlight');

                if (match) {
                    const isOrder = element.classList.contains('searchable-row');

                    const title = isOrder
                        ? 'Pesanan ' + (
                            element.querySelector('.order-code')?.textContent.trim() || ''
                        )
                        : (
                            element.querySelector('.product-data strong')?.textContent.trim()
                            || 'Produk'
                        );

                    const description = isOrder
                        ? (
                            element.querySelector('.customer-name')?.textContent.trim()
                            || 'Pelanggan'
                        )
                        : 'Produk PizzaMozza';

                    results.push({
                        element: element,
                        title: title,
                        description: description,
                        type: isOrder ? 'Pesanan' : 'Produk'
                    });
                }
            });

            const orderFound = document.querySelectorAll(
                '#orderTableBody .searchable-row:not(.search-hidden)'
            ).length;

            document.getElementById('orderNoResult')
                ?.classList.toggle(
                    'show',
                    keyword !== '' && orderFound === 0
                );

            const bestSellerFound = document.querySelectorAll(
                '#bestSellerList .searchable-product:not(.search-hidden)'
            ).length;

            document.getElementById('bestSellerNoResult')
                ?.classList.toggle(
                    'show',
                    keyword !== '' && bestSellerFound === 0
                );

            const latestProductFound = document.querySelectorAll(
                '#latestProductList .searchable-product:not(.search-hidden)'
            ).length;

            document.getElementById('latestProductNoResult')
                ?.classList.toggle(
                    'show',
                    keyword !== '' && latestProductFound === 0
                );

            if (keyword === '') {
                return;
            }

            if (results.length > 0) {
                results.forEach(result => {
                    const item = document.createElement('button');

                    item.type = 'button';
                    item.className = 'search-result-item';

                    const icon = document.createElement('i');

                    icon.className = result.type === 'Pesanan'
                        ? 'bi bi-receipt'
                        : 'bi bi-box-seam';

                    const content = document.createElement('div');

                    const title = document.createElement('strong');
                    title.textContent = result.title;

                    const description = document.createElement('span');

                    description.textContent =
                        result.type + ' • ' + result.description;

                    content.appendChild(title);
                    content.appendChild(description);

                    item.appendChild(icon);
                    item.appendChild(content);

                    item.addEventListener('click', function () {
                        result.element.scrollIntoView({
                            behavior: 'smooth',
                            block: 'center'
                        });

                        result.element.classList.add('search-highlight');

                        setTimeout(() => {
                            result.element.classList.remove('search-highlight');
                        }, 2000);

                        searchResults.classList.remove('show');
                    });

                    searchResults.appendChild(item);
                });

                searchResults.classList.add('show');

            } else {
                const empty = document.createElement('div');

                empty.className = 'search-empty';
                empty.textContent = 'Data tidak ditemukan. Coba kata kunci lain.';

                searchResults.appendChild(empty);
                searchResults.classList.add('show');
            }
        }

        searchInput.addEventListener('input', filterDashboard);

        clearSearch.addEventListener('click', function () {
            searchInput.value = '';

            filterDashboard();

            searchInput.focus();
        });

        searchInput.addEventListener('keydown', function (event) {
            if (event.key === 'Escape') {
                searchInput.value = '';

                filterDashboard();

                searchResults.classList.remove('show');
            }
        });

        document.addEventListener('click', function (event) {
            if (
                !searchInput.contains(event.target) &&
                !searchResults.contains(event.target)
            ) {
                searchResults.classList.remove('show');
            }
        });


        /* GRAFIK */

        const chartLabels = @json($tanggalGrafik ?? []);
        const chartData = @json($dataGrafik ?? []);

        if (!chartLabels.length || !chartData.length) {
            chartLabels.push('Belum ada data');
            chartData.push(0);
        }

        const salesChart = new Chart(
            document.getElementById('salesChart'),
            {
                type: 'line',

                data: {
                    labels: chartLabels,

                    datasets: [{
                        label: 'Omzet Penjualan',
                        data: chartData,

                        borderColor: '#941919',
                        backgroundColor: 'rgba(148, 25, 25, .10)',

                        borderWidth: 3,
                        fill: true,
                        tension: .4,

                        pointRadius: 4,
                        pointBackgroundColor: '#941919',
                        pointBorderColor: '#ffffff',
                        pointBorderWidth: 2
                    }]
                },

                options: {
                    responsive: true,
                    maintainAspectRatio: false,

                    interaction: {
                        intersect: false,
                        mode: 'index'
                    },

                    plugins: {
                        legend: {
                            display: false
                        },

                        tooltip: {
                            callbacks: {
                                label: function (context) {
                                    return 'Rp ' +
                                        new Intl.NumberFormat('id-ID')
                                            .format(context.raw);
                                }
                            }
                        }
                    },

                    scales: {
                        y: {
                            beginAtZero: true,

                            ticks: {
                                font: {
                                    family: 'Inter',
                                    size: 10
                                },

                                callback: function (value) {
                                    return 'Rp ' +
                                        new Intl.NumberFormat('id-ID', {
                                            notation: 'compact'
                                        }).format(value);
                                }
                            },

                            grid: {
                                color: '#f0f0f0'
                            }
                        },

                        x: {
                            ticks: {
                                font: {
                                    family: 'Inter',
                                    size: 10
                                }
                            },

                            grid: {
                                display: false
                            }
                        }
                    }
                }
            }
        );


        /* FILTER PERIODE GRAFIK */

        document.querySelectorAll('.chart-period').forEach(button => {
            button.addEventListener('click', function () {
                document.querySelectorAll('.chart-period').forEach(item => {
                    item.classList.remove('active');
                });

                this.classList.add('active');

                const period = Number(this.dataset.period);

                const count = period === 7
                    ? 7
                    : period === 30
                        ? 30
                        : chartLabels.length;

                salesChart.data.labels = chartLabels.slice(-count);

                salesChart.data.datasets[0].data = chartData.slice(-count);

                salesChart.update();

                document.getElementById('chartDescription').textContent =
                    period === 7
                        ? 'Omzet pembayaran berhasil selama 7 hari terakhir'
                        : period === 30
                            ? 'Omzet pembayaran berhasil selama 30 hari terakhir'
                            : 'Omzet pembayaran berdasarkan data yang tersedia';
            });
        });


        /* LOGOUT */

        function openLogoutModal() {
            document.getElementById('logoutModal')
                .classList.add('show');
        }

        function closeLogoutModal() {
            document.getElementById('logoutModal')
                .classList.remove('show');
        }

        function confirmLogout() {
            document.getElementById('logoutForm').submit();
        }

        document.getElementById('logoutModal')
            .addEventListener('click', function (event) {
                if (event.target === this) {
                    closeLogoutModal();
                }
            });

        document.addEventListener('keydown', function (event) {
            if (event.key === 'Escape') {
                closeLogoutModal();
            }
        });
    </script>

</body>

</html>