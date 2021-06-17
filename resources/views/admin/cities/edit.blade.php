@extends('admin.parent')

@section('title','Dashboard')

@section('style')
    <link rel="stylesheet" href="{{asset('doccure/admin/assets/css/select2.min.css')}}">

    <style>
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
                    <h4 class="card-title">Edit Form</h4>
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

                    <form action="{{ route('cities.update',$city->id) }}" method="POST" id="create_city_form">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>First Name</label>
                            <input name="name" value="{{ $city->name }}" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Activity Status</label>
                            <div class="status-toggle">
                                <input name="status" type="checkbox" id="status_1" class="check"
                                @if ($city->status === 'Active') checked @endif>
                                <label for="status_1" class="checktoggle">checkbox</label>
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
    <script src="{{asset('doccure/admin/assets/js/select2.min.js')}}"></script>

    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
    <script>
        $( "#create_city_form" ).validate({
            rules: {
                name: {
                required: true,
                minlength: 3,
                maxlength: 15,
                }
            },
            messages: {
                name: {
                    required: 'Please, enter city name',
                    minlength: 'Name must be at lest at 5 character',
                    maxlength: 'Nmae must be at less than 15 character'
                }
            }
        });
    </script>
@endsection
