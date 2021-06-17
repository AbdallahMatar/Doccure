@extends('admin.parent')

@section('title','Cities')

@section('style')

@endsection

@section('page-title','Cities')
@section('page-breadcrumb','Cities')

@section('action')
    <div class="col-sm-5 col">
        <a href="{{ route('cities.create') }}" class="btn btn-primary float-right mt-2">Add City</a>
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
                                <th>Id</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th>States Count</th>
                                <th>Created At</th>
                                <th>Settings</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($cities as $city)
                                <tr>
                                    <td>{{ $cities->firstItem()+$loop->index }}</td>
                                    <td>{{ $city->name }}</td>
                                    <td>{{ $city->status }}</td>
                                    <td>
                                        <a href="{{ route('cities.states', $city->id) }}" type="button" class="btn btn-outline-primary btn-sm">{{ $city->states_count }} - State/s</a>
                                    </td>
                                    <td>{{ $city->created_at->diffForHumans() }}</td>
                                    <td>
                                        <a class="btn btn-sm bg-success-light" href="{{ route('cities.edit',$city->id) }}">
                                            <i class="fe fe-pencil"></i> Edit
                                        </a>
                                        @if ($city->states_count == 0)
                                        <button class="btn btn-sm bg-danger-light" onclick="confirmDelete(this, '{{ $city->id }}')">
                                            <i class="fe fe-trash"></i> Delete
                                        </button>
                                        @else
                                        <a class="btn btn-sm bg-danger-light disabled" href="#" onclick="confirmDelete(this, '{{ $city->id }}')">
                                            <i class="fe fe-trash"></i> Delete
                                        </a>
                                        @endif

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row justify-content-center">
                    {{ $cities->links() }}
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
        axios.delete('/cms/admin/cities/'+id)
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
