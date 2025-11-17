<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Sistem Perpustakaan MAN 2 Kota Payakumbuh')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #01747B;
            --secondary-color: #00ABB5;
            --accent-color: #00D2DF;
            --light-color: #B5FBFF;
            --dark-color: #004F54;
        }

        body {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            position: relative;
            padding: 15px;
        }

        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url("{{ asset('assets/bg-image.jpg') }}");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            z-index: -2;
        }

        body::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to top, var(--primary-color) 0%, rgba(1, 116, 123, 0) 100%);
            z-index: -1;
        }

        .auth-container {
            background-color: #ffff;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            width: 100%;
            max-width: 560px;
            margin: 10px;
        }

        .auth-header {
            background: #ffff;
            color: var(--dark-color);
            padding: 15px 20px;
            text-align: center;
        }

        .auth-header img {
            max-height: 80px;
            margin-bottom: 15px;
            width: auto;
        }

        .auth-header h1 {
            font-size: clamp(1.5rem, 4vw, 2.2rem);
            margin: 0;
            font-weight: 600;
            line-height: 1.2;
        }

        .auth-header h4 {
            font-size: clamp(1rem, 3.5vw, 1.5rem);
            margin-bottom: 8px;
        }

        .auth-body {
            padding: clamp(20px, 4vw, 30px);
        }

        .form-control {
            border-radius: 8px;
            padding: 12px 15px;
            border: 1px solid #ddd;
            transition: all 0.3s;
            font-size: clamp(14px, 2vw, 16px);
        }

        .form-control:focus {
            border-color: var(--secondary-color);
            box-shadow: 0 0 0 0.25rem rgba(0, 171, 181, 0.25);
        }

        .input-group-text {
            background-color: #ffff;
            border: 1px solid #ddd;
            border-right: none;
            border-radius: 8px 0 0 8px;
            padding: 12px 15px;
        }

        .password-input-group {
            position: relative;
        }

        .password-input-group .form-control {
            border-left: none;
            border-radius: 0 8px 8px 0;
            padding-right: 50px;
        }

        .password-toggle {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            background: transparent;
            border: none;
            color: #777;
            cursor: pointer;
            z-index: 5;
            padding: 5px;
            transition: color 0.3s;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .password-toggle:hover {
            color: var(--secondary-color);
        }

        .btn-auth {
            background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
            border: none;
            color: #ffff;
            padding: 14px;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s;
            width: 100%;
            font-size: clamp(14px, 2vw, 16px);
        }

        .btn-auth:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            color: #ffff;
        }

        .btn-back-home {
            background: linear-gradient(to right, var(--dark-color), #00666d);
            border: none;
            color: #ffff;
            padding: 14px;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s;
            width: 100%;
            font-size: clamp(14px, 2vw, 16px);
            text-decoration: none;
            display: block;
            text-align: center;
        }

        .btn-back-home:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            color: #ffff;
            background: linear-gradient(to right, #004147, #005a61);
        }

        @media (hover: none) and (pointer: coarse) {
            .btn-back-home:hover {
                transform: none;
            }
        }

        .auth-footer {
            text-align: center;
            margin-top: 20px;
            color: #777;
            font-size: clamp(0.8rem, 2vw, 0.9rem);
            padding: 0 10px;
        }

        .form-label {
            font-weight: 500;
            color: var(--dark-color);
            font-size: clamp(14px, 2vw, 16px);
        }

        .alert {
            border-radius: 8px;
            font-size: clamp(14px, 2vw, 16px);
        }

        @media (max-width: 576px) {
            body {
                padding: 10px;
                display: flex;
                justify-content: center;
                align-items: center;
                padding-top: 20px;
            }

            .auth-container {
                margin: 0;
                border-radius: 12px;
            }

            .auth-header {
                padding: 15px;
            }

            .auth-header img {
                max-height: 70px
            }

            .auth-body {
                padding: 30px;
            }

            .form-control,
            .input-group-text {
                padding: 14px 12px;
            }

            .btn-auth {
                padding: 16px;
            }

            .d-flex.justify-content-between .form-check {
                margin-bottom: 0 !important;
            }
        }

        @media (max-width: 400px) {
            .auth-header h1 {
                font-size: 1.5rem;
            }

            .auth-header h4 {
                font-size: 1rem;
            }

            .auth-header img {
                max-height: 60px;
            }
        }

        @media (hover: none) and (pointer: coarse) {
            .btn-auth:hover {
                transform: none;
            }

            .password-toggle {
                min-width: 44px;
                min-height: 44px;
            }
        }
    </style>

    @stack('styles')
</head>

<body>
    @yield('content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>

</html>
