<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Sistem Perpustakaan MAN 2 Kota Payakumbuh')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}">
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
            height: 100vh;
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
            max-height: 54px;
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
            z-index: 1100;
            position: absolute;
            right: -12px;
            top: 50%;
            transform: translateY(-50%);
            background: white;
            border-radius: 50%;
            width: 24px;
            height: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            box-shadow: var(--shadow-medium);
            color: var(--primary-color);
            border: 1px solid #e0e0e0;
            transition: all var(--transition-speed);
        }

        .toggle-sidebar:hover {
            background: var(--light-color);
            transform: translateY(-50%) scale(1.1);
            box-shadow: var(--shadow-heavy);
        }

        .sidebar.collapsed .toggle-sidebar i {
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
            border-left: 4px solid var(--accent-color);
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

        .notification-icon {
            position: relative;
            cursor: pointer;
            color: var(--primary-color);
            font-size: 20px;
        }

        .notification-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            background: #ff4757;
            color: white;
            border-radius: 50%;
            width: 18px;
            height: 18px;
            font-size: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
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

        .user-info .user-name {
            font-weight: 600;
            font-size: 14px;
        }

        .user-info .user-role {
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

            // Toggle sidebar pada desktop
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

            // Chart bar animation
            const bars = document.querySelectorAll('.chart-bar');
            bars.forEach(bar => {
                const height = bar.getAttribute('data-height');
                bar.style.height = height + 'px';

                // Add click event to show more details
                bar.addEventListener('click', function() {
                    const value = this.getAttribute('data-value');
                    const label = this.getAttribute('data-label');
                    alert(`Peminjaman pada ${label}: ${value} buku`);
                });
            });
        });
    </script>
    @stack('scripts')
</body>

</html>