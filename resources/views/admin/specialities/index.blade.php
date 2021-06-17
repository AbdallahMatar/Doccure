@extends('admin.parent')

@section('title','specialities')

@section('style')

@endsection

@section('page-title','specialities')
@section('page-breadcrumb','specialities')

@section('action')
    <div class="col-sm-5 col">
        <a href="{{ route('specialities.create') }}" class="btn btn-primary float-right mt-2">Add Speciality</a>
    </div>
@endsection

@section('page-wrapper')

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-center mb-0">
                            <thead>
                            <tr>
                                <th>Image</th>
                                <th>Id</th>
                                <th>Title</th>
                                <th>Status</th>
                                <th>Settings</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($specialities as $speciality)
                                    <tr>
                                        <td>
                                            <h2 class="table-avatar">
                                                <div class="avatar avatar-sm mr-2">
                                                    <img class="avatar-img"
                                                         src="{{ url('images/speciality/' . $speciality->image) }}">
                                                </div>
                                            </h2>
                                        </td>
                                        <td>{{ $speciality->id }}</td>
                                        <td>{{ $speciality->title }}</td>
                                        <td>{{ $speciality->status }}</td>
                                        <td>
                                            <a href="{{ route('specialities.show',$speciality->id) }}" class="btn btn-sm bg-info-light">
                                                <i class="fa fa-eye"></i> View
                                            </a>
                                            <a class="btn btn-sm bg-success-light" href="{{ route('specialities.edit',$speciality->id) }}">
                                                <i class="fe fe-pencil"></i> Edit
                                            </a>
                                            <a onclick="confirmDelete(this, '{{ $speciality->id }}')" type="button" class="btn btn-sm bg-danger-light">
                                                <i class="fe fe-trash"></i> Delete
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row justify-content-center">
                    {{ $specialities->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<script>
    function confirmDelete(app, id){
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.value) {
                deleteSpeciality(app, id)
            }
        })
    }

    function deleteSpeciality(app, id){
        axios.delete('/cms/admin/specialities/'+id)
            .then(function (response) {
                // handle success
                app.closest('tr').remove();
                showMessage(response.data)
            })
            .catch(function (error) {
                // handle error
                showMessage(error.response.data)
            })
            .then(function () {
                // always executed
            });
        }

    function showMessage(data){
        Swal.fire({
            title: data.title,
            text: data.text,
            icon: data.icon,
            showConfirmButton: false,
            timer: 1500,
        })
    }
</script>
@endsection
