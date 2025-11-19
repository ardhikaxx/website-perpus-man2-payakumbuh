<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Sistem Perpustakaan MAN 2 Kota Payakumbuh')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/logo-side.png') }}" type="image/x-icon">
    <style>
        :root {
            --primary-color: #01747B;
            --secondary-color: #00ABB5;
            --accent-color: #00D2DF;
            --light-color: #B5FBFF;
            --dark-color: #004F54;
            --sidebar-width: 280px;
            --sidebar-collapsed: 80px;
            --header-height: 70px;
            --transition-speed: 0.3s;
            --shadow-light: 0 2px 10px rgba(0, 0, 0, 0.05);
            --shadow-medium: 0 5px 15px rgba(0, 0, 0, 0.1);
            --shadow-heavy: 0 10px 25px rgba(0, 0, 0, 0.15);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f7fb;
            color: #333;
            overflow-x: hidden;
        }

        .admin-container {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: var(--sidebar-width);
            background: #ffffff;
            color: #333;
            position: fixed;
            height: 150vh;
            overflow-y: auto;
            transition: all var(--transition-speed) ease;
            z-index: 1000;
            box-shadow: var(--shadow-heavy);
            border-right: 1px solid #e0e0e0;
        }

        .sidebar.collapsed {
            width: var(--sidebar-collapsed);
        }

        .sidebar.hidden {
            transform: translateX(-100%);
            width: 0;
        }

        .sidebar-header {
            background: #ffffff;
            padding: 20px;
            text-align: center;
            border-bottom: 1px solid #e0e0e0;
            position: relative;
            transition: all var(--transition-speed);
        }

        .sidebar.collapsed .sidebar-header {
            padding: 15px 10px;
        }

        .sidebar-logo {
            transition: all var(--transition-speed);
        }

        .sidebar-logo img {
            width: auto;
            max-height: 48px;
            transition: all var(--transition-speed);
        }

        .sidebar-logo .side-logo {
            display: none;
        }

        .sidebar.collapsed .sidebar-logo .full-logo {
            display: none;
        }

        .sidebar.collapsed .sidebar-logo .side-logo {
            display: block;
        }

        .toggle-sidebar {
            position: fixed;
            left: 265px;
            top: 32px;
            width: 32px;
            height: 32px;
            color: #ffff;
            font-size: 20px;
            background: var(--primary-color);
            border: 2px solid #e2e8f0;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            z-index: 1001;
            transition: all 0.3s ease;
        }

        .toggle-sidebar:hover {
            background: var(--dark-color);
            color: #ffff;
            transform: scale(1.1);
        }

        .toggle-sidebar i {
            transition: all 0.3s ease;
        }

        .sidebar.collapsed+.toggle-sidebar {
            left: 65px;
        }

        .sidebar.collapsed+.toggle-sidebar i {
            transform: rotate(180deg);
        }

        .sidebar-menu {
            padding: 15px 0;
        }

        .sidebar-menu ul {
            list-style: none;
            padding: 0;
        }

        .sidebar-menu li {
            margin-bottom: 5px;
            position: relative;
        }

        .sidebar-menu a {
            display: flex;
            align-items: center;
            padding: 14px 20px;
            color: #555;
            text-decoration: none;
            transition: all var(--transition-speed);
            position: relative;
            overflow: hidden;
            border-left: 4px solid transparent;
        }

        .sidebar-menu a::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 0;
            background: rgba(1, 116, 123, 0.1);
            transition: width var(--transition-speed);
        }

        .sidebar-menu a:hover::before,
        .sidebar-menu a.active::before {
            width: 100%;
        }

        .sidebar-menu a:hover,
        .sidebar-menu a.active {
            color: var(--primary-color);
            border-left: 5px solid var(--dark-color);
            background: rgba(1, 116, 123, 0.05);
        }

        .sidebar-menu i {
            margin-right: 15px;
            font-size: 18px;
            width: 24px;
            text-align: center;
            transition: margin var(--transition-speed);
            color: var(--primary-color);
        }

        .sidebar.collapsed .sidebar-menu i {
            margin-right: 0;
        }

        .menu-text {
            transition: opacity var(--transition-speed);
            font-weight: 500;
        }

        .sidebar.collapsed .menu-text {
            opacity: 0;
            width: 0;
            display: none;
        }

        .menu-badge {
            background: var(--accent-color);
            color: var(--dark-color);
            border-radius: 10px;
            padding: 2px 8px;
            font-size: 12px;
            font-weight: bold;
            margin-left: auto;
            transition: opacity var(--transition-speed);
        }

        .sidebar.collapsed .menu-badge {
            opacity: 0;
            display: none;
        }

        .mobile-close {
            display: none;
            padding: 15px;
            text-align: center;
            border-top: 1px solid #e0e0e0;
            margin-top: 20px;
        }

        .mobile-close button {
            border: none;
            background: transparent;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            transition: all var(--transition-speed);
        }

        .mobile-close i {
            height: 40px;
            width: 40px;
            background: rgba(1, 116, 123, 0.1);
            border: none;
            color: var(--primary-color);
            font-size: 25px;
            padding: 25px;
            border-radius: 100%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .mobile-close i:hover {
            background: rgba(1, 116, 123, 0.2);
        }

        /* Main Content Styles */
        .main-content {
            flex: 1;
            margin-left: var(--sidebar-width);
            transition: all var(--transition-speed) ease;
        }

        .sidebar.collapsed~.main-content {
            margin-left: var(--sidebar-collapsed);
        }

        .sidebar.hidden~.main-content {
            margin-left: 0;
        }

        /* Header Styles */
        .header {
            height: var(--header-height);
            background-color: white;
            box-shadow: var(--shadow-light);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 30px;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .header-left {
            display: flex;
            align-items: center;
        }

        .mobile-toggle {
            display: none;
            background: none;
            border: none;
            font-size: 20px;
            color: var(--primary-color);
            cursor: pointer;
            margin-right: 15px;
        }

        .header-left h1 {
            font-size: 24px;
            font-weight: 600;
            color: var(--primary-color);
            margin: 0;
        }

        .header-right {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .user-profile {
            display: flex;
            align-items: center;
            cursor: pointer;
            position: relative;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 10px;
            color: white;
            font-weight: bold;
            box-shadow: var(--shadow-light);
        }

        .user-avatar img {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            object-fit: cover;
        }

        .avatar-header {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
        }

        .user-info .user-name {
            font-weight: 600;
            font-size: 14px;
        }

        .user-info .user-email {
            font-size: 12px;
            color: #6c757d;
        }

        .user-dropdown {
            position: absolute;
            top: 100%;
            right: 0;
            background: white;
            border-radius: 8px;
            box-shadow: var(--shadow-medium);
            width: 200px;
            padding: 10px 0;
            opacity: 0;
            visibility: hidden;
            transform: translateY(10px);
            transition: all var(--transition-speed);
            z-index: 101;
        }

        .user-profile:hover .user-dropdown {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .user-dropdown a {
            display: flex;
            align-items: center;
            padding: 10px 20px;
            color: #333;
            text-decoration: none;
            transition: all var(--transition-speed);
        }

        .user-dropdown a:hover {
            background: #f8f9fa;
            color: var(--primary-color);
        }

        .user-dropdown i {
            margin-right: 10px;
            width: 20px;
            text-align: center;
        }

        /* Content Area */
        .content {
            padding: 30px;
            min-height: calc(100vh - var(--header-height));
        }

        /* Responsive */
        @media (max-width: 992px) {
            .sidebar {
                width: var(--sidebar-width);
                transform: translateX(-100%);
            }

            .sidebar.show {
                transform: translateX(0);
            }

            .sidebar.collapsed {
                width: var(--sidebar-width);
            }

            .sidebar.collapsed .menu-text {
                opacity: 1;
                display: block;
            }

            .sidebar.collapsed .sidebar-logo .full-logo {
                display: block;
            }

            .sidebar.collapsed .sidebar-logo .side-logo {
                display: none;
            }

            .sidebar.collapsed .sidebar-menu i {
                margin-right: 15px;
            }

            .main-content {
                margin-left: 0;
            }

            .mobile-toggle {
                display: block;
            }

            .toggle-sidebar {
                display: none;
            }

            .mobile-close {
                display: block;
            }
        }

        @media (max-width: 768px) {
            .header {
                padding: 0 15px;
            }

            .content {
                padding: 15px;
            }

            .header-left h1 {
                font-size: 20px;
            }
        }

        @media (max-width: 576px) {
            .sidebar {
                width: 100%;
            }

            .user-info {
                display: none;
            }
        }

        .btn-primary {
            background: var(--primary-color);
            color: #ffff;
            border: none;
        }

        .btn-primary:hover {
            background: var(--dark-color);
            color: #ffff;
            border: none;
        }

        .swal2-popup {
            border-radius: 25px !important;
        }

        .swal2-title {
            font-size: 1.5rem !important;
            font-weight: 600 !important;
            color: #2d3748 !important;
        }

        .swal2-html-container {
            font-size: 1rem !important;
            color: #718096 !important;
        }
    </style>

    @stack('styles')
</head>

<body>
    <div class="admin-container">
        @include('partials.sidebar')
        <div class="main-content">
            @include('partials.header')
            <div class="content">
                @yield('content')
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.querySelector('.sidebar');
            const toggleSidebar = document.querySelector('.toggle-sidebar');
            const mobileToggle = document.querySelector('.mobile-toggle');
            const mobileCloseSidebar = document.getElementById('mobileCloseSidebar');
            const mainContent = document.querySelector('.main-content');

            toggleSidebar.addEventListener('click', function() {
                sidebar.classList.toggle('collapsed');
            });

            mobileToggle.addEventListener('click', function() {
                sidebar.classList.add('show');
            });

            mobileCloseSidebar.addEventListener('click', function() {
                sidebar.classList.remove('show');
            });

            document.addEventListener('click', function(event) {
                const isClickInsideSidebar = sidebar.contains(event.target);
                const isClickInsideMobileToggle = mobileToggle.contains(event.target);

                if (!isClickInsideSidebar && !isClickInsideMobileToggle && window.innerWidth <= 992) {
                    sidebar.classList.remove('show');
                }
            });

            window.addEventListener('resize', function() {
                if (window.innerWidth > 992) {
                    sidebar.classList.remove('show');
                    sidebar.classList.remove('hidden');
                }
            });
        });
    </script>
    @stack('scripts')
</body>

</html>
