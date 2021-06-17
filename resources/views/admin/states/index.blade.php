@extends('admin.parent')

@section('title','States')

@section('style')

@endsection

@section('page-title','States')
@section('page-breadcrumb','States')

@section('action')
    <div class="col-sm-5 col">
        <a href="{{ route('states.create') }}" class="btn btn-primary float-right mt-2">Add States</a>
    </div>
@endsection

@section('page-wrapper')

    {{-- @if (session()->has('alert-type'))
        <div class="alert {{ session()->get('alert-type') }} alert-dismissible fade show" role="alert">
                {{ session()->get('message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif --}}
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-center mb-0">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th>City</th>
                                <th>Created At</th>
                                <th>Settings</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($states as $state)
                                <tr>
                                    <td>{{ $state->id }}</td>
                                    <td>{{ $state->name }}</td>
                                    <td>{{ $state->status }}</td>
                                    <td>{{ $state->city->name }}</td>
                                    <td>{{ $state->created_at->diffForHumans() }}</td>
                                    <td>
                                        <a class="btn btn-sm bg-success-light" href="{{ route('states.edit',$state->id) }}">
                                            <i class="fe fe-pencil"></i> Edit
                                        </a>
                                        <a class="btn btn-sm bg-danger-light" href="#" onclick="confirmDelete(this, '{{ $state->id }}')">
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
                    {{ $states->links() }}
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
                deleteCity(app, id)
            }
        })
    }

    function deleteCity(app, id){
        axios.delete('/cms/admin/states/'+id)
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
