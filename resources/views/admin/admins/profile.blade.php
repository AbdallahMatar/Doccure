@extends('admin.parent')

@section('title','Admin')

@section('style')

@endsection

@section('page-title','Admin')
@section('page-breadcrumb','Admin')

@section('action')

@endsection

@section('page-wrapper')
    <div class="row">
        <div class="col-md-12">
            <div class="profile-header">
                <div class="row align-items-center">
                    <div class="col-auto profile-image">
                        <a href="#">
                            <img class="rounded-circle" alt="User Image" src="{{ url('images/admin/' . $admin->image) }}">
                        </a>
                    </div>
                    <div class="col ml-md-n2 profile-user-info">
                        <h4 class="user-name mb-0">{{ $admin->first_name }} {{ $admin->last_name }}</h4>
                        <h6 class="text-muted">{{ $admin->email }}</h6>
                        <div class="user-Location"><i class="fa fa-map-marker"></i> {{ $admin->state->name }}, Gaza</div>
                    </div>
                </div>
            </div>
            <div class="tab-content profile-tab-cont">

                <!-- Personal Details Tab -->
                <div class="tab-pane fade show active" id="per_details_tab">

                    <!-- Personal Details -->
                    <div class="row">
                        <div class="col-xl-12 d-flex">
                            <div class="card flex-fill">
                                <div class="card-body">
                                    <form action="#">
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label text-muted">Name :</label>
                                            <div class="col-lg-9">
                                                <p class="col-sm-10 pt-2">{{ $admin->first_name }} {{ $admin->last_name }}</p>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label text-muted">Date of Birth :</label>
                                            <div class="col-lg-9">
                                                <p class="col-sm-10 pt-2">{{ $admin->birth_date }}</p>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label text-muted">Email Id :</label>
                                            <div class="col-lg-9">
                                                <p class="col-sm-10 pt-2">{{ $admin->email }}</p>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label text-muted">Mobile :</label>
                                            <div class="col-lg-9">
                                                <p class="col-sm-10 pt-2">{{ $admin->mobile }}</p>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label text-muted">Gender :</label>
                                            <div class="col-lg-9">
                                                <p class="col-sm-10 pt-2">{{ $admin->gender }}</p>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label text-muted">Status :</label>
                                            <div class="col-lg-9">
                                                <p class="col-sm-10 pt-2">{{ $admin->status }}</p>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label text-muted">Address :</label>
                                            <div class="col-lg-9">
                                                <p class="col-sm-10 mb-0 pt-2">{{ $admin->state->name }},<br>
                                                    Gaza,<br>
                                                    Palestine.</p>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Personal Details -->
                </div>
                <!-- /Personal Details Tab -->

            </div>
        </div>
    </div>
@endsection
