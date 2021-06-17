@extends('admin.parent')

@section('title','Patient')

@section('style')
    <link rel="stylesheet" href="{{asset('doccure/admin/assets/css/select2.min.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.css">


    <style>
        .date_biker{
            background-color: #ffffff;
        }
    </style>
@endsection

@section('page-wrapper')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">New Patient</h4>
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

                    <form action="{{ route('patients.update',$patient->id) }}" method="POST" id="create_admin_form" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>City</label>
                                <select class="form-control select" name="city_id" id="city_id" onchange="getCityStates()">
                                    <option disabled selected>--Select--</option>
                                    @foreach ($cities as $city)
                                        <option value="{{ $city->id }}" @if ($patient->state->city_id == $city->id) selected @endif>{{ $city->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>State</label>
                                <select class="form-control select" name="state_id" id="state_id">
                                    <option disabled selected>--Select--</option>
                                    @foreach ($states as $state)
                                        <option value="{{ $state->id }}" @if ($patient->state_id == $state->id) selected @endif>{{ $state->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom01">First name</label>
                                <input type="text" name="first_name" value="{{ $patient->first_name }}" class="form-control" id="first_name" placeholder="First name" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom02">Last name</label>
                                <input type="text" name="last_name" value="{{ $patient->last_name }}" class="form-control" id="last_name" placeholder="Last name" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom01">Email</label>
                                <input type="text" name="email" value="{{ $patient->email }}" class="form-control" id="email" placeholder="Email" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom02">Mobile</label>
                                <input type="text" name="mobile" value="{{ $patient->mobile }}" class="form-control" id="mobile" placeholder="Mobiel" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3 pl-0">
                                <label class="col-lg-3 col-form-label">Gender</label>
                                    <div class="col-lg-9">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="gender_male" value="Male" @if ($patient->gender == 'Male') checked @endif>
                                            <label class="form-check-label" for="gender_male">
                                                Male
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="gender_female" value="Female" @if ($patient->gender == 'Female') checked @endif>
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
                                    <label>Birth date</label>
                                    <input type="text" class="form-control date_biker" id="published_at" name="birth_date" id="date" value="{{ $patient->birth_date }}" style="background-color: #ffffff;">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label>Blood Group</label>
                                    <select class="form-control select" name="blood_type" id="blood_type">
                                        <option disabled selected>Please select type</option>
                                        <option>A-</option>
                                        <option>A+</option>
                                        <option>B-</option>
                                        <option>B+</option>
                                        <option>AB-</option>
                                        <option>AB+</option>
                                        <option>O-</option>
                                        <option>O+</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            @if ($patient->image != '')
                                <div class="col-md-3 mb-3">
                                    <img src="{{ url('images/patient/' . $patient->image) }}" style="width: 70px;height: 70px;">
                                </div>
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Image</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="file" name="patient_image" accept="image/*">
                                    </div>
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
    <script src="{{asset('doccure/assets/plugins/select2/js/select2.min.js')}}"></script>

    <!-- Mask JS -->
    <script src="{{asset('doccure/admin/assets/js/jquery.maskedinput.min.js')}}"></script>
    <script src="{{asset('doccure/admin/assets/js/mask.js')}}"></script>

    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>

        flatpickr('#published_at', {
                    enableTime: true
                })

        $( "#create_admin_form" ).validate({
            rules: {
                city_id: {
                    required: true,
                    integer: true
                },
                state_id: {
                    required: true,
                    integer: true
                },
                first_name: {
                    required: true,
                    string: true,
                    minlength: 3,
                    maxlength: 10
                },
                last_name: {
                    required: true,
                    string: true,
                    minlength: 3,
                    maxlength: 10
                },
                email: {
                    required: true,
                    email: true
                },
                mobile: {
                    required: true
                }
            }
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
    </script>
@endsection
