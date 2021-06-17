<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Doccure - Lock Screen</title>

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
                <div class="login-left">
                    <img class="img-fluid" src="{{asset('doccure/admin/assets/img/logo.png')}}" alt="Logo">
                </div>
                <div class="login-right">
                    <div class="login-right-wrap">
                        <div class="lock-user">
                            <img class="rounded-circle" src="{{asset('doccure/admin/assets/img/profiles/avatar-02.jpg')}}" alt="User Image">
                            <h4>John Doe</h4>
                        </div>

                        <!-- Form -->
                        <form action="index.html">
                            <div class="form-group">
                                <input class="form-control" type="text" placeholder="Password">
                            </div>
                            <div class="form-group mb-0">
                                <button class="btn btn-primary btn-block" type="submit">Enter</button>
                            </div>
                        </form>
                        <!-- /Form -->

                        <div class="text-center dont-have">Sign in as a different user? <a href="login.html">Login</a>
                        </div>
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
