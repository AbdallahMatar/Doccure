<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Doccure Doctor - @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

    <!-- Favicons -->
    <link href="{{asset('doccure/assets/img/favicon.png')}}" rel="icon">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('doccure/assets/css/bootstrap.min.css')}}">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{asset('doccure/assets/plugins/fontawesome/css/fontawesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('doccure/assets/plugins/fontawesome/css/all.min.css')}}">

    @yield('style')

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{asset('doccure/assets/css/style.css')}}">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
			<script src="{{asset('doccure/assets/js/html5shiv.min.js')}}"></script>
			<script src="{{asset('doccure/assets/js/respond.min.js')}}"></script>
		<![endif]-->
</head>
<body>

<!-- Main Wrapper -->
<div class="main-wrapper">
    <!-- Breadcrumb -->
    <div class="breadcrumb-bar">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-12 col-12">
                    <nav aria-label="breadcrumb" class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active">Doctor</li>
                            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                        </ol>
                    </nav>
                    <h2 class="breadcrumb-title">Dashboard</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- /Breadcrumb -->

    <!-- Page Content -->
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
                    <!-- Profile Sidebar -->
                    <div class="profile-sidebar">
                        <div class="widget-profile pro-widget-content">
                            <div class="profile-info-widget">
                                <a href="#" class="booking-doc-img">
                                    <img src="{{ url('images/doctor/' . Auth()->user()->image) }}"
                                         alt="User Image">
                                </a>
                                <div class="profile-det-info">
                                    <h3>{{ Auth()->user()->first_name . ' ' . Auth()->user()->last_name }}</h3>

                                    <div class="patient-details">
                                        <h5>speciality : {{ Auth()->user()->speciality->title }}</h5>
                                        <h5><i class="fas fa-birthday-cake"></i>{{ Auth()->user()->birth_date }}</h5>
                                        <h5><i class="fas fa-map-marker-alt"></i>{{ Auth()->user()->state->name }} , Palestine</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="dashboard-widget">
                            <nav class="dashboard-menu">
                                <ul>
                                    <li class="active">
                                        <a href="{{route('doctor.dashboard')}}">
                                            <i class="fas fa-columns"></i>
                                            <span>Dashboard</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route('doctor.appointments')}}">
                                            <i class="fas fa-calendar-check"></i>
                                            <span>Appointments</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route('doctor.my-patients')}}">
                                            <i class="fas fa-user-injured"></i>
                                            <span>My Patients</span>
                                        </a>
                                    </li>
{{--                                    <li>--}}
{{--                                        <a href="{{route('doctor.schedule-timings')}}">--}}
{{--                                            <i class="fas fa-hourglass-start"></i>--}}
{{--                                            <span>Schedule Timings</span>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
                                    <li>
                                        <a href="{{route('doctor.invoices')}}">
                                            <i class="fas fa-file-invoice"></i>
                                            <span>Invoices</span>
                                        </a>
                                    </li>
{{--                                    <li>--}}
{{--                                        <a href="{{route('doctor.reviews')}}">--}}
{{--                                            <i class="fas fa-star"></i>--}}
{{--                                            <span>Reviews</span>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
                                    <li>
                                        <a href="{{route('doctor.profile-settings')}}">
                                            <i class="fas fa-user-cog"></i>
                                            <span>Profile Settings</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route('doctor.social-media')}}">
                                            <i class="fas fa-share-alt"></i>
                                            <span>Social Media</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route('doctor.change-password')}}">
                                            <i class="fas fa-lock"></i>
                                            <span>Change Password</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('doctor.logout') }}">
                                            <i class="fas fa-sign-out-alt"></i>
                                            <span>Logout</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <!-- /Profile Sidebar -->
                </div>

                @yield('content')
            </div>
        </div>
    </div>
    <!-- /Page Content -->
</div>
<!-- /Main Wrapper -->

@yield('modal')

<!-- jQuery -->
<script src="{{asset('doccure/assets/js/jquery.min.js')}}"></script>

<!-- Bootstrap Core JS -->
<script src="{{asset('doccure/assets/js/popper.min.js')}}"></script>
<script src="{{asset('doccure/assets/js/bootstrap.min.js')}}"></script>

<!-- Sticky Sidebar JS -->
<script src="{{asset('doccure/assets/plugins/theia-sticky-sidebar/ResizeSensor.js')}}"></script>
<script src="{{asset('doccure/assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js')}}"></script>

@yield('scripts')

<!-- Custom JS -->
<script src="{{asset('doccure/assets/js/script.js')}}"></script>

</body>
</html>
