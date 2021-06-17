@extends('doctor.parent')

@section('title','Profile Settings')

@section('style')
    <!-- Select2 CSS -->
    <link rel="stylesheet" href="{{asset('doccure/assets/plugins/select2/css/select2.min.css')}}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('doccure/assets/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css')}}">

    <link rel="stylesheet" href="{{asset('doccure/assets/plugins/dropzone/dropzone.min.css')}}">
@endsection

@section('content')
    <div class="col-md-7 col-lg-8 col-xl-9">

        <!-- Basic Information -->
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Basic Information</h4>
                <div class="row form-row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="change-avatar">
                                <div class="profile-img">
                                    <img src="{{asset('doccure/assets/img/doctors/doctor-thumb-02.jpg')}}" alt="User Image">
                                </div>
                                <div class="upload-img">
                                    <div class="change-photo-btn">
                                        <span><i class="fa fa-upload"></i> Upload Photo</span>
                                        <input type="file" class="upload">
                                    </div>
                                    <small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Username <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>First Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Last Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Phone Number</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Gender</label>
                            <select class="form-control select">
                                <option>Select</option>
                                <option>Male</option>
                                <option>Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-0">
                            <label>Date of Birth</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Basic Information -->

        <!-- About Me -->
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">About Me</h4>
                <div class="form-group mb-0">
                    <label>Biography</label>
                    <textarea class="form-control" rows="5"></textarea>
                </div>
            </div>
        </div>
        <!-- /About Me -->

        <!-- Contact Details -->
        <div class="card contact-card">
            <div class="card-body">
                <h4 class="card-title">Contact Details</h4>
                <div class="row form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Address Line 1</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Address Line 2</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">City</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">State / Province</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
{{--                    <div class="col-md-6">--}}
{{--                        <div class="form-group">--}}
{{--                            <label class="control-label">Country</label>--}}
{{--                            <input type="text" class="form-control">--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-6">--}}
{{--                        <div class="form-group">--}}
{{--                            <label class="control-label">Postal Code</label>--}}
{{--                            <input type="text" class="form-control">--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>
        <!-- /Contact Details -->

        <!-- Pricing -->
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Pricing</h4>

                <div class="form-group mb-0">
                    <div id="pricing_select">
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="price_free" name="rating_option" class="custom-control-input" value="price_free" checked>
                            <label class="custom-control-label" for="price_free">Free</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="price_custom" name="rating_option" value="custom_price" class="custom-control-input">
                            <label class="custom-control-label" for="price_custom">Custom Price (per hour)</label>
                        </div>
                    </div>

                </div>

                <div class="row custom_price_cont" id="custom_price_cont" style="display: none;">
                    <div class="col-md-4">
                        <input type="text" class="form-control" id="custom_rating_input" name="custom_rating_count" value="" placeholder="20">
                        <small class="form-text text-muted">Custom price you can add</small>
                    </div>
                </div>

            </div>
        </div>
        <!-- /Pricing -->

        <div class="submit-section submit-btn-bottom">
            <button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
        </div>

    </div>
@endsection

@section('scripts')
    <!-- Select2 JS -->
    <script src="{{asset('doccure/assets/plugins/select2/js/select2.min.js')}}"></script>

    <!-- Dropzone JS -->
    <script src="{{asset('doccure/assets/plugins/dropzone/dropzone.min.js')}}"></script>

    <!-- Bootstrap Tagsinput JS -->
    <script src="{{asset('doccure/assets/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.js')}}"></script>

    <!-- Profile Settings JS -->
    <script src="{{asset('doccure/assets/js/profile-settings.js')}}"></script>
@endsection
