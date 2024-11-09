<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BLOG APP | Login</title>
    <!-- Icon Title -->
    <link rel="shortcut icon" href="{{ asset('images/blog-logo-small.png') }}">
    <!-- Bootstrap Css -->
    <link href="{{ asset('css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="container-fluid login">
        <div class="row">
            <div class="col-md-6">
                <div class="square"></div>
                <div class="login-body">
                    <div class="login-title text-center mt-5">
                        <img src="{{ asset('images/blog.png') }}" width="100px" alt="logo">
                        <h1>Selamat Datang <br>di BLOG APP</h1>
                        @if (session('status'))
                            <p>Status: {{ session('status') }}</p>
                        @endif
                        @if (session('message'))
                            <p>{{ session('message') }}</p>
                        @endif
                    </div>
                    <div class="login-form">
                        <form action="" method="post">
                            @csrf
                            <label for="email">Alamat E-Mail</label><br>
                            <input type="email" id="email" name="email" placeholder="Masukkan alamat E-Mail" required><br>
                
                            <label for="password">Kata Sandi</label><br>
                            <input type="password" id="password" name="password" placeholder="Masukkan kata sandi" required>
                            <i class="fas fa-eye-slash" id="togglePassword"></i>
                            
                            <br><a href="{{ route('register') }}">Belum punya akun?</a><br>
                
                            <div class="button login-button">
                                <button type="submit">Masuk <i class="fas fa-arrow-right"></i></button>
                            </div>
                            @if($errors->any())
                                <p class="error-login"> {{ $errors -> first('error') }} </p>
                            @endif
                
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="square2"></div>
                <div class="logo2">
                    <img src="{{ asset('images/login.png') }}" width="100%" alt="loginimg">
                </div>
            </div>
        </div>
    </div>

    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');

        togglePassword.addEventListener('click', function() {
            if (password.type === 'password') {
            password.type = 'text';
            togglePassword.classList.add('fa-eye');
            togglePassword.classList.remove('fa-eye-slash');
            } else {
            password.type = 'password';
            togglePassword.classList.add('fa-eye-slash');
            togglePassword.classList.remove('fa-eye');
            }
        });
    </script>

    <script src="{{ asset('libs/bootstrap/js/bootstrap.min.js') }}"></script>
</body>
</html>