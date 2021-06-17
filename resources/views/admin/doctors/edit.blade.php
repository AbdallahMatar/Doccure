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
    </style>
@endsection

@section('page-wrapper')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">New Doctor</h4>
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

                    <form action="{{ route('doctors.update',$doctor->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom01">First name</label>
                                <input type="text" name="first_name" value="{{ $doctor->first_name }}" class="form-control" id="first_name" placeholder="First name" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom02">Last name</label>
                                <input type="text" name="last_name" value="{{ $doctor->last_name }}" class="form-control" id="last_name" placeholder="Last name" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom01">Email</label>
                                <input type="text" name="email" value="{{ $doctor->email }}" class="form-control" id="email" placeholder="Email" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom02">Mobile</label>
                                <input type="text" name="mobile" value="{{ $doctor->mobile }}" class="form-control" id="mobile" placeholder="Mobiel" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>City <span class="text-danger">*</span></label>
                                <select class="form-control select" name="city_id" id="city_id" onchange="getCityStates()">
                                    <option disabled selected>--Select--</option>
                                    @foreach ($cities as $city)
                                        <option value="{{ $city->id }}" @if ($doctor->state->city_id == $city->id) selected @endif>{{ $city->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>State <span class="text-danger">*</span></label>
                                <select class="form-control select" name="state_id" id="state_id">
                                    <option disabled selected>--Select--</option>
                                    @foreach ($states as $state)
                                        <option value="{{ $state->id }}" @if ($doctor->state_id == $state->id) selected @endif>{{ $state->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom01">Speciality</label>
                                <select class="form-control" name="speciality_id" id="speciality_id">
                                    <option>--Select--</option>
                                    @foreach ($specialities as $speciality)
                                        <option value="{{ $speciality->id }}" @if ($doctor->speciality_id == $speciality->id) selected @endif>{{ $speciality->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label>Birth date</label>
                                    <input type="text" class="form-control date_biker" id="published_at" name="birth_date" id="date" value="{{ $doctor->birth_date }}" style="background-color: #ffffff;">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3 pl-0">
                                <label class="col-lg-3 col-form-label">Gender</label>
                                    <div class="col-lg-9">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="gender_male" value="Male" @if ($doctor->gender == 'Male') checked @endif>
                                            <label class="form-check-label" for="gender_male">
                                                Male
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="gender_female" value="Female" @if ($doctor->gender == 'Female') checked @endif>
                                            <label class="form-check-label" for="gender_female">
                                                Female
                                            </label>
                                        </div>
                                    </div>
                            </div>
                        </div>
                            <div class="card-body">
                                <h4 class="card-title">About</h4>
                                <div class="form-group mb-0">
                                    <textarea class="form-control" rows="5" name="about" value="{{ old('about') }}">{{ $doctor->about }}</textarea>
                                </div>
                            </div>
                            <div class="row">
                            @if ($doctor->image != '')
                                <div class="col-md-3 mb-3">
                                    <img src="{{ url('images/doctor/' . $doctor->image) }}" style="width: 70px;height: 70px;">
                                </div>
                            @endif
                            </div>
                        <div class="row">
                            <div class="col-md-7 mt-3">
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Image</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="file" name="doctor_image" accept="image/*">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-3 ml-5">
                                <label>Activity Status</label>
                                <div class="status-toggle">
                                    <input name="status" type="checkbox" id="status_1" class="check"
                                    @if ($doctor->status == 'Active') checked @endif>
                                    <label for="status_1" class="checktoggle">checkbox</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3 pl-0">
                                <label class="col-lg-3 col-form-label">Pricing</label>
                                    <div class="col-lg-9">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="pricing" id="pricing_free" value="Free" @if ($doctor->pricing == 'Free') checked @endif>
                                            <label class="form-check-label" for="pricing_free">
                                                Free
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="pricing" id="pricing_perHour" value="PerHour" @if ($doctor->pricing == 'PerHour') checked @endif>
                                            <label class="form-check-label" for="pricing_perHour">
                                                PerHour
                                            </label>
                                        </div>
                                    </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom01">Hour Price</label>
                                <input type="text" name="hour_price" value="{{ $doctor->hour_price }}" class="form-control" id="hour_price" placeholder="Hour Price" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom01">Facebook url</label>
                                <input type="text" name="facebook" value="{{ $doctor->facebook_url }}" class="form-control" id="facebook" placeholder="Facebook url">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom02">Twitter url</label>
                                <input type="text" name="twitter" value="{{ $doctor->twitter_url }}" class="form-control" id="twitter" placeholder="Twitter url">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom01">Linked in url</label>
                                <input type="text" name="linked" value="{{ $doctor->linked_in_url }}" class="form-control" id="linked" placeholder="Linked in url">
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
    <script>
        flatpickr('#published_at', {
            enableTime: true
        })

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
z
