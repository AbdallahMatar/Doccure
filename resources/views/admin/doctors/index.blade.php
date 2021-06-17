@extends('admin.parent')

@section('title','Doctors')

@section('style')

@endsection

@section('page-title','Doctors')
@section('page-breadcrumb','Doctors')

@section('action')
    <div class="col-sm-5 col">
        <a href="{{ route('doctors.create') }}" class="btn btn-primary float-right mt-2">Add Doctor</a>
    </div>
@endsection

@section('page-wrapper')

    <div class="row text-center">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-center mb-0">
                            <thead>
                            <tr>
                                <th>Image</th>
                                <th>Id</th>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Gender</th>
                                <th>Birth Date</th>
                                <th>Status</th>
                                <th>Settings</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($doctors as $doctor)
                                <tr>
                                    <td>
                                        <div class="avatar avatar-lg">
                                            <img class="avatar-img rounded-circle" alt="User Image" src="{{ url('images/doctor/' . $doctor->image) }}">
                                        </div>
                                    </td>
                                    <td>{{ $doctor->id }}</td>
                                    <td>{{ $doctor->first_name }} {{ $doctor->last_name }}</td>
                                    <td>{{ $doctor->email }}</td>
                                    <td>{{ $doctor->gender }}</td>
                                    <td>{{ $doctor->birth_date }}</td>
                                    <td>{{ $doctor->status }}</td>
                                    <td>
                                        <a href="{{ route('doctors.show',$doctor->id) }}" class="btn btn-sm bg-info-light">
                                            <i class="fa fa-eye"></i> View
                                        </a>
                                        <a href="{{ route('doctors.edit',$doctor->id) }}" type="button" class="btn btn-sm bg-success-light">
                                            <i class="fe fe-pencil"></i> Edit
                                        </a>
                                        <a onclick="confirmDelete(this, '{{ $doctor->id }}')" type="button" class="btn btn-sm bg-danger-light">
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
                    {{ $doctors->links() }}
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
                deleteAdmin(app, id)
            }
        })
    }

    function deleteAdmin(app, id){
        axios.delete('/cms/admin/doctors/'+id)
            .then(function (response) {
                // handle success
                app.closest('tr').remove();
                showMessage(response.data);
            })
            .catch(function (error) {
                // handle error
                showMessage(error.response.data);
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
            timer: 1500
        })
    }
</script>
@endsection
