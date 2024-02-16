<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive Admin Dashboard Template">
    <meta name="keywords" content="admin,dashboard">
    <meta name="author" content="stacks">
    
    <!-- Title -->
    <title>Login</title>

    <!-- Styles -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
    <link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/perfectscroll/perfect-scrollbar.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/pace/pace.css') }}" rel="stylesheet">

    
    <!-- Theme Styles -->
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">

    <link rel="icon" type="image/jpg" sizes="32x32" href="{{ asset('assets/images/logo.jpg') }}" />
    <link rel="icon" type="image/jpg" sizes="16x16" href="{{ asset('assets/images/logo.jpg') }}" />
</head>
<body>
    <div class="app app-auth-sign-in align-content-stretch d-flex flex-wrap justify-content-end">
        <div class="app-auth-background">

        </div>
        <div class="app-auth-container">
            <div class="logo">
                <h2>Monitoring Bangkom</h2>
            </div>
            <p class="auth-description">Silahkan login menggunakan akun Anda untuk melanjutkan menuju dashboard atau <a href="/pelatihan-berlangsung">Akses sebagai tamu</a></p>

            <form method="POST" action="/login">
                @csrf
                <div class="auth-credentials m-b-xxl">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control m-b-md" id="username" placeholder="username" name="username">

                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;" name="password">
                </div>

                <div class="auth-submit">
                    <button type="submit" class="btn btn-primary float-end">Sign In</button>
                </div>
            </form>
        </div>
    </div>
    
    <!-- Javascripts -->
    <script src="{{ asset('assets/plugins/jquery/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/perfectscroll/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/pace/pace.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
</body>
</html>