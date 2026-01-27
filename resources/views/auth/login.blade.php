<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>Login - Terminal Cilacap</title>
    <!-- GLOBAL MAINLY STYLES-->
    <link href="{{ asset('./assets/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('./assets/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('./assets/vendors/themify-icons/css/themify-icons.css') }}" rel="stylesheet" />
    <!-- THEME STYLES-->
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.85) 0%, rgba(118, 75, 162, 0.85) 100%),
            url('{{ asset('assets/img/terminal-bus-cilacap-1.jpg') }}') center/cover no-repeat fixed;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            position: relative;
            overflow: hidden;
        }

        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(255, 255, 255, 0.05);
            z-index: 1;
        }

        body::after {
            content: '';
            position: absolute;
            width: 400px;
            height: 400px;
            background: rgba(255, 255, 255, 0.08);
            border-radius: 50%;
            bottom: -150px;
            right: -150px;
            animation: float 8s ease-in-out infinite;
            z-index: 1;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px) rotate(0deg);
            }

            50% {
                transform: translateY(-20px) rotate(5deg);
            }
        }

        .login-container {
            position: relative;
            z-index: 10;
            width: 100%;
            max-width: 450px;
        }

        .login-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            padding: 50px 40px;
            animation: slideUp 0.5s ease-out;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .logo-container {
            text-align: center;
            margin-bottom: 25px;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 30px;
        }

        .logo-container img {
            max-height: 65px;
            filter: drop-shadow(0 4px 6px rgba(0, 0, 0, 0.1));
            animation: fadeIn 0.8s ease-out;
        }

        .logo-text {
            display: none;
        }

        .login-title {
            text-align: center;
            color: #333;
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 8px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-shadow: 0 2px 10px rgba(102, 126, 234, 0.1);
            letter-spacing: -0.5px;
        }

        .login-subtitle {
            text-align: center;
            color: #888;
            font-size: 14px;
            margin-bottom: 30px;
            font-weight: 400;
            letter-spacing: 0.3px;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.9);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-label {
            font-size: 13px;
            font-weight: 600;
            color: #555;
            margin-bottom: 10px;
            display: block;
            letter-spacing: 0.3px;
        }

        .input-wrapper {
            position: relative;
        }

        .input-wrapper i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #999;
            font-size: 16px;
            z-index: 1;
        }

        .toggle-password {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #999;
            font-size: 16px;
            cursor: pointer;
            z-index: 1;
            transition: color 0.3s ease;
        }

        .toggle-password:hover {
            color: #667eea;
        }

        .form-control {
            width: 100%;
            padding: 14px 15px 14px 45px;
            border: 2px solid #e0e0e0;
            border-radius: 12px;
            font-size: 14px;
            transition: all 0.3s ease;
            background: #fff;
        }

        .form-control.has-toggle {
            padding-right: 45px;
        }

        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
            outline: none;
        }

        .form-control::placeholder {
            color: #bbb;
        }

        .remember-forgot {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .checkbox-wrapper {
            display: flex;
            align-items: center;
        }

        .checkbox-wrapper input[type="checkbox"] {
            width: 18px;
            height: 18px;
            margin-right: 8px;
            cursor: pointer;
        }

        .checkbox-wrapper label {
            font-size: 14px;
            color: #666;
            cursor: pointer;
            margin: 0;
        }

        .btn-login {
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            border-radius: 12px;
            color: white;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.6);
        }

        .btn-login:active {
            transform: translateY(0);
        }

        .back-link {
            text-align: center;
            margin-top: 25px;
        }

        .back-link a {
            color: #667eea;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .back-link a:hover {
            color: #764ba2;
        }

        .alert {
            border-radius: 12px;
            padding: 12px 15px;
            margin-bottom: 20px;
            border: none;
            animation: slideDown 0.3s ease-out;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .alert-success {
            background: #d4edda;
            color: #155724;
        }

        .alert-danger {
            background: #f8d7da;
            color: #721c24;
        }

        .alert ul {
            margin: 0;
            padding-left: 20px;
        }

        .alert .close {
            float: right;
            font-size: 20px;
            font-weight: 700;
            line-height: 1;
            color: inherit;
            opacity: 0.5;
            cursor: pointer;
            background: transparent;
            border: 0;
        }

        .alert .close:hover {
            opacity: 0.75;
        }

        /* Responsive */
        @media (max-width: 576px) {
            .login-card {
                padding: 40px 30px;
            }

            .login-title {
                font-size: 24px;
            }
        }
    </style>
</head>

<body>
    <div class="login-container">
        <div class="login-card">
            <div class="logo-container">
                <img src="{{ asset('assets/img/logo_kemenhub.png') }}" alt="Kemenhub">
                <img src="{{ asset('assets/img/logo_terminal.png') }}" alt="Terminal Cilacap">
            </div>

            <h2 class="login-title">Selamat Datang</h2>
            <p class="login-subtitle">Sistem Informasi Terminal Cilacap</p>

            @if(session('success'))
            <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <i class="fa fa-check-circle"></i> {{ session('success') }}
            </div>
            @endif

            @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form id="login-form" action="{{ route('login') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label class="form-label">Username</label>
                    <div class="input-wrapper">
                        <i class="fa fa-user"></i>
                        <input class="form-control" type="text" name="username" placeholder="Masukkan username Anda"
                            value="{{ old('username') }}" autofocus required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Password</label>
                    <div class="input-wrapper">
                        <i class="fa fa-lock"></i>
                        <input class="form-control has-toggle" type="password" id="password" name="password" placeholder="Masukkan password Anda" required>
                        <i class="fa fa-eye-slash toggle-password" id="togglePassword"></i>
                    </div>
                </div>

                <div class="remember-forgot">
                    <div class="checkbox-wrapper">
                        <input type="checkbox" name="remember" id="remember">
                        <label for="remember">Ingat Saya</label>
                    </div>
                </div>

                <button class="btn-login" type="submit">
                    <i class="fa fa-sign-in"></i> Masuk Sekarang
                </button>
            </form>

            <div class="back-link">
                <a href="/">
                    <i></i> Kembali ke Beranda
                </a>
            </div>
        </div>
    </div>

    <!-- CORE PLUGINS -->
    <script src="{{ asset('./assets/vendors/jquery/dist/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('./assets/vendors/popper.js/dist/umd/popper.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('./assets/vendors/bootstrap/dist/js/bootstrap.min.js') }}" type="text/javascript"></script>

    <script type="text/javascript">
        $(function() {
            // Auto hide alert setelah 5 detik
            setTimeout(function() {
                $('.alert').fadeOut('slow');
            }, 5000);

            // Close button untuk alert
            $('.close').click(function() {
                $(this).closest('.alert').fadeOut('slow');
            });

            // Toggle password visibility
            $('#togglePassword').click(function() {
                const passwordField = $('#password');
                const type = passwordField.attr('type') === 'password' ? 'text' : 'password';
                passwordField.attr('type', type);

                // Toggle icon
                $(this).toggleClass('fa-eye-slash fa-eye');
            });

            // Form validation feedback
            $('#login-form').on('submit', function() {
                $('.btn-login').html('<i class="fa fa-spinner fa-spin"></i> Memproses...');
                $('.btn-login').prop('disabled', true);
            });
        });
    </script>
</body>

</html>