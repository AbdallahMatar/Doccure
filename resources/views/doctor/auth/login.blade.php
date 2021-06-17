<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Doccure - Login</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('doccure/admin/assets/img/favicon.png')}}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('doccure/admin/assets/css/bootstrap.min.css')}}">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{asset('doccure/admin/assets/css/font-awesome.min.css')}}">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{asset('doccure/admin/assets/css/style.css')}}">

<!--[if lt IE 9]>
			<script src="{{asset('doccure/admin/assets/js/html5shiv.min.js')}}"></script>
			<script src="{{asset('doccure/admin/assets/js/respond.min.js')}}"></script>
		<![endif]-->
</head>
<body>

<!-- Main Wrapper -->
<div class="main-wrapper login-body">
    <div class="login-wrapper">
        <div class="container">
            <div class="loginbox">
                <div class="login-left" style="align-items: center;
                background: linear-gradient(180deg, #89c2f5, #02282e);">
                    <img class="img-fluid" src="{{asset('doccure/admin/assets/img/logo-white.png')}}" alt="Logo">
                </div>
                <div class="login-right">
                    <div class="login-right-wrap">
                        <h1>Login</h1>
                        <p class="account-subtitle">Access to Doctor dashboard</p>

                        <!-- Form -->
                        <form action="{{ route('doctor.login') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <input name="email" value="{{ old('email') }}" class="form-control" type="email" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <input name="password" class="form-control" type="password" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary btn-block" type="submit">Login</button>
                            </div>
                        </form>
                        <!-- /Form -->

                        <div class="text-center forgotpass"><a href="forgot-password.html">Forgot Password?</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Main Wrapper -->

<!-- jQuery -->
<script src="{{asset('doccure/admin/assets/js/jquery-3.2.1.min.js')}}"></script>

<!-- Bootstrap Core JS -->
<script src="{{asset('doccure/admin/assets/js/popper.min.js')}}"></script>
<script src="{{asset('doccure/admin/assets/js/bootstrap.min.js')}}"></script>

<!-- Custom JS -->
<script src="{{asset('doccure/admin/assets/js/script.js')}}"></script>

</body>
</html>
