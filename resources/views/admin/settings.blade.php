@extends('admin.parent')

@section('title','Settings')

@section('style')

@endsection

@section('page-title','General Settings')
@section('page-breadcrumb','General Settings')

@section('page-wrapper')
    <div class="row">
        <div class="col-12">
            <!-- General -->
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">General</h4>
                </div>
                <div class="card-body">
                    <form action="#">
                        <div class="form-group">
                            <label>Website Name</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Website Logo</label>
                            <input type="file" class="form-control">
                            <small class="text-secondary">Recommended image size is <b>150px x 150px</b></small>
                        </div>
                        <div class="form-group mb-0">
                            <label>Favicon</label>
                            <input type="file" class="form-control">
                            <small class="text-secondary">Recommended image size is <b>16px x 16px</b> or <b>32px x 32px</b></small><br>
                            <small class="text-secondary">Accepted formats : only png and ico</small>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /General -->
        </div>
    </div>
@endsection

@section('scripts')

@endsection
