@extends('admin.parent')

@section('title','Admin')

@section('style')
    <link rel="stylesheet" href="{{asset('doccure/admin/assets/css/select2.min.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.css">
    <style>
        .date_biker{
            background-color: #ffffff;
        }
        .error{
            color: #e63333;
        }
    </style>
@endsection

@section('page-wrapper')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">New Admin</h4>
                </div>
                <div class="card-body">

                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ $error }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endforeach
                    @endif

                    <form action="{{ route('admins.store') }}" method="POST" id="create_admin_form" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>City <span class="text-danger">*</span></label>
                                <select class="form-control select" name="city_id" id="city_id" onchange="getCityStates()">
                                    <option disabled selected>--Select--</option>
                                    @foreach ($cities as $city)
                                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>State <span class="text-danger">*</span></label>
                                <select class="form-control select" name="state_id" id="state_id">
                                    <option disabled selected>--Select--</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>First Name <span class="text-danger">*</span></label>
                                <input type="text" name="first_name" value="{{ old('first_name') }}" class="form-control" id="first_name" placeholder="First name">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Last Name <span class="text-danger">*</span></label>
                                <input type="text" name="last_name" value="{{ old('last_name') }}" class="form-control" id="last_name" placeholder="Last name">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>Email <span class="text-danger">*</span></label>
                                <input type="text" name="email" value="{{ old('email') }}" class="form-control" id="email" placeholder="Email">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Mobile <span class="text-danger">*</span></label>
                                <input type="number" name="mobile" value="{{ old('mobile') }}" class="form-control" id="mobile"  pattern="[0-9]*" inputmode="numeric" placeholder="Mobiel">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>Password <span class="text-danger">*</span></label>
                                <input type="password" name="password" value="{{ old('password') }}" class="form-control" id="password" placeholder="*****">
                            </div>
                            <div class="col-md-6 mb-3 pl-0">
                                <label class="col-lg-3 col-form-label">Gender <span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="gender_male" value="Male">
                                            <label class="form-check-label" for="gender_male">
                                                Male
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="gender_female" value="Female">
                                            <label class="form-check-label" for="gender_female">
                                                Female
                                            </label>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                <label>Birth date <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control date_biker" id="published_at" name="birth_date" id="date" value="{{ old('birth_date') }}" style="background-color: #ffffff;">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label>Activity Status</label>
                                    <div class="status-toggle">
                                        <input name="status" type="checkbox" id="status_1" class="check" checked>
                                        <label for="status_1" class="checktoggle">checkbox</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10 mb-3">
                                <div class="form-group row">
                                <label class="col-form-label col-md-2">Image <span class="text-danger">*</span></label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="file" name="admin_image" accept="image/*">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.js"></script>
    <script src="{{asset('doccure/admin/assets/js/select2.min.js')}}"></script>

<!-- Mask JS -->
    <script src="{{asset('doccure/admin/assets/js/jquery.maskedinput.min.js')}}"></script>
    <script src="{{asset('doccure/admin/assets/js/mask.js')}}"></script>

    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <script src="{{asset('doccure/admin/assets/js/select2.min.js')}}"></script>

    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
    <script>

        flatpickr('#published_at', {
                    enableTime: true
                });

        function getCityStates(){
            var selectedCityId = document.getElementById('city_id').value;
            var stateSelect = document.getElementById('state_id');

            stateSelect.length = 0;

            @foreach($cities as $city)
            if(selectedCityId == '{{ $city->id }}'){
                @foreach($city->states as $state)
                    var option = document.createElement('option');
                    option.text = '{{ $state->name }}';
                    option.value = '{{ $state->id }}';
                    stateSelect.add(option);
                @endforeach
            }
            @endforeach
            // var option = document.createElement('option');
            // option.text = "State ABC";
            // stateSelect.add(option);
        }

        $( "#create_admin_form" ).validate({
            rules: {
                first_name: {
                    required: true,
                    minlength: 3,
                    maxlength: 15,
                },
                last_name: {
                    required: true,
                    minlength: 3,
                    maxlength: 15,
                },
                email: {
                    required: true,
                    email: true
                },
                mobile: {
                    required:true,
                    minlength:9,
                    maxlength:10,
                    number: true
                },
                password: {
                    minlength: 6,
                    maxlength: 30,
                    required: true,
                    checklower: true,
                    checkupper: true,
                    checkdigit: true
                },
            },
            messages: {
                first_name: {
                    required: 'Please, enter first name',
                    minlength: 'Name must be at lest at 3 character',
                    maxlength: 'Nmae must be at less than 15 character'
                },
                last_name: {
                    required: 'Please, enter last name',
                    minlength: 'Name must be at lest at 3 character',
                    maxlength: 'Nmae must be at less than 15 character'
                },
                email: {
                    required: 'Please enter email',
                    email: 'Please enter an email'
                },
                mobile: {
                    required: 'Please, enter mobile no',
                    minlength: 'Name must be at lest at 9 character',
                    maxlength: 'Nmae must be at less than 10 character'
                },
                password: {
                    pwcheck: "Password is not strong enough",
                    checklower: "Need atleast 1 lowercase alphabet",
                    checkupper: "Need atleast 1 uppercase alphabet",
                    checkdigit: "Need atleast 1 digit"
                }
            }
        });


    </script>
@endsection
