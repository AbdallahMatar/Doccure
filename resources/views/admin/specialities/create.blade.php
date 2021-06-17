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
                    <h4 class="card-title">New Speciality</h4>
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

                    <form action="{{ route('specialities.store') }}" method="POST" id="create_speciality_form" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="post title">Title:</label>
                            <input type="text" class="form-control" name="title" placeholder="Add a New Post">
                        </div>
                        <div class="form-group">
                            <label for="post description">Description:</label>
                            <textarea class="form-control" rows="2" name="description" placeholder="Add a description"></textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-7 mt-3">
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Image</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="file" name="specialities_image" accept="image/*">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-3 ml-5">
                                <label>Activity Status</label>
                                <div class="status-toggle">
                                    <input name="status" type="checkbox" id="status_1" class="check" checked>
                                    <label for="status_1" class="checktoggle">checkbox</label>
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
    <script src="{{asset('doccure/admin/assets/js/select2.min.js')}}"></script>

    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
    <script>
        $( "#create_speciality_form" ).validate({
            rules: {
                title: {
                    required: true,
                    minlength: 3,
                    maxlength: 15,
                },
                description: {
                    required: true,
                },
                specialities_image: {
                    required: true
                }
            },
            messages: {
                title: {
                    required: 'Please, enter title name',
                    minlength: 'Name must be at lest at 3 character',
                    maxlength: 'Name must be at less than 15 character'
                },
                description: {
                    required: 'Please, enter the description'
                },
                specialities_image: {
                    required: 'Please, upload image'
                }
            }
        });
    </script>
@endsection
