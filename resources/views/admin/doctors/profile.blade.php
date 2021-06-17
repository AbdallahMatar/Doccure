@extends('admin.parent')

@section('title','Doctor')

@section('style')

@endsection

@section('page-title','Doctor')
@section('page-breadcrumb','Doctor')

@section('action')

@endsection

@section('page-wrapper')
<div class="row">
    <div class="col-md-12">
        <div class="profile-header">
            <div class="row align-items-center">
                <div class="col-auto profile-image">
                    <a href="#">
                        <img class="rounded-circle" alt="User Image" src="{{ url('images/doctor/' . $doctor->image) }}">
                    </a>
                </div>
                <div class="col ml-md-n2 profile-user-info">
                    <h4 class="user-name mb-0">{{ $doctor->first_name }} {{ $doctor->last_name }}</h4>
                    <h6 class="text-muted">{{ $doctor->email }}</h6>
                    <div class="user-Location"><i class="fa fa-map-marker"></i> {{ $doctor->state->name }}, Palestine</div>
                    <div class="about-text">{{ $doctor->about }}</div>
                </div>
            </div>
        </div>
        <div class="tab-content profile-tab-cont">

            <!-- Personal Details Tab -->
            <div class="tab-pane fade show active" id="per_details_tab">

                <!-- Personal Details -->
                <h5 class="card-title d-flex justify-content-between">
                    <span>Personal Details</span>
                </h5>
                <div class="row">
                    <div class="col-xl-6 d-flex">
                        <div class="card flex-fill">
                            <div class="card-body">
                                <form action="#">
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label text-muted">Name :</label>
                                        <div class="col-lg-9">
                                            <p class="col-sm-10 pt-2">{{ $doctor->first_name }} {{ $doctor->last_name }}</p>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label text-muted">Speciality :</label>
                                        <div class="col-lg-9">
                                            <p class="col-sm-10 pt-2">{{ $doctor->speciality->title }}</p>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label text-muted">Date of Birth :</label>
                                        <div class="col-lg-9">
                                            <p class="col-sm-10 pt-2">{{ $doctor->birth_date }}</p>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label text-muted">Email Id :</label>
                                        <div class="col-lg-9">
                                            <p class="col-sm-10 pt-2">{{ $doctor->email }}</p>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label text-muted">Mobile :</label>
                                        <div class="col-lg-9">
                                            <p class="col-sm-10 pt-2">{{ $doctor->mobile }}</p>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label text-muted">Address :</label>
                                        <div class="col-lg-9">
                                            <p class="col-sm-10 mb-0 pt-2">{{ $doctor->state->name }},<br>
                                                Gaza,<br>
                                                Palestine.</p>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 d-flex">
                        <div class="card flex-fill">
                            <div class="card-body">
                                <form action="#">
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label text-muted">Gender :</label>
                                        <div class="col-lg-9">
                                            <p class="col-sm-10 pt-2">{{ $doctor->gender }}</p>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label text-muted">Status :</label>
                                        <div class="col-lg-9">
                                            <p class="col-sm-10 pt-2">{{ $doctor->status }}</p>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label text-muted">Pricing :</label>
                                        <div class="col-lg-9">
                                            <p class="col-sm-10 pt-2">{{ $doctor->pricing }}</p>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label text-muted">Hour Price :</label>
                                        <div class="col-lg-9">
                                            <p class="col-sm-10 pt-2">{{ $doctor->hour_price }}</p>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label text-muted">Facebook url:</label>
                                        <div class="col-lg-9">
                                            <p class="col-sm-10 pt-2">{{ $doctor->facebook_url }}</p>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label text-muted">Twitter url :</label>
                                        <div class="col-lg-9">
                                            <p class="col-sm-10 pt-2">{{ $doctor->twitter_url }}</p>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label text-muted">Linked In url :</label>
                                        <div class="col-lg-9">
                                            <p class="col-sm-10 pt-2">{{ $doctor->linked_in_url }}</p>
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
