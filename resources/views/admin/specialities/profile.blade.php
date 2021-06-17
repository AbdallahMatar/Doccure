@extends('admin.parent')

@section('title','Speciality')

@section('style')

@endsection

@section('page-title','Speciality')
@section('page-breadcrumb','Speciality')

@section('action')

@endsection

@section('page-wrapper')
    <div class="profile-header">
        <div class="row align-items-center">
            <div class="col-auto profile-image">
                <a href="#">
                    <img class="rounded-circle" alt="User Image" src="{{ url('images/speciality/' . $speciality->image) }}">
                </a>
            </div>
            <div class="col ml-md-n2 profile-user-info">
                <h4 class="user-name mb-0">{{ $speciality->title }}</h4>
                <h6 class="text-muted">{{ $speciality->status }}</h6>
                <div class="about-text">{{ $speciality->description }}</div>
            </div>
        </div>
    </div>
@endsection
