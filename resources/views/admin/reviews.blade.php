@extends('admin.parent')

@section('title','Dashboard')

@section('style')

@endsection

@section('page-wrapper')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="datatable table table-hover table-center mb-0">
                            <thead>
                            <tr>
                                <th>Patient Name</th>
                                <th>Doctor Name</th>
                                <th>Ratings</th>
                                <th>Description</th>
                                <th>Date</th>
                                <th class="text-right">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <h2 class="table-avatar">
                                        <a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{asset('doccure/admin/assets/img/patients/patient1.jpg')}}" alt="User Image"></a>
                                        <a href="profile.html">Charlene Reed </a>
                                    </h2>
                                </td>
                                <td>
                                    <h2 class="table-avatar">
                                        <a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{asset('doccure/admin/assets/img/doctors/doctor-thumb-01.jpg')}}" alt="User Image"></a>
                                        <a href="profile.html">Dr. Ruby Perrin</a>
                                    </h2>
                                </td>

                                <td>
                                    <i class="fe fe-star text-warning"></i>
                                    <i class="fe fe-star text-warning"></i>
                                    <i class="fe fe-star text-warning"></i>
                                    <i class="fe fe-star text-warning"></i>
                                    <i class="fe fe-star-o text-secondary"></i>
                                </td>

                                <td>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit
                                </td>
                                <td>3 Nov 2019 <br><small>09.59 AM</small></td>
                                <td class="text-right">
                                    <div class="actions">
                                        <a class="btn btn-sm bg-danger-light" data-toggle="modal" href="#delete_modal">
                                            <i class="fe fe-trash"></i> Delete
                                        </a>

                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h2 class="table-avatar">
                                        <a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{asset('doccure/admin/assets/img/patients/patient2.jpg')}}" alt="User Image"></a>
                                        <a href="profile.html">Travis Trimble </a>
                                    </h2>
                                </td>


                                <td>
                                    <h2 class="table-avatar">
                                        <a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{asset('doccure/admin/assets/img/doctors/doctor-thumb-02.jpg')}}" alt="User Image"></a>
                                        <a href="profile.html">Dr. Darren Elder</a>
                                    </h2>
                                </td>

                                <td>
                                    <i class="fe fe-star text-warning"></i>
                                    <i class="fe fe-star text-warning"></i>
                                    <i class="fe fe-star text-warning"></i>
                                    <i class="fe fe-star text-warning"></i>
                                    <i class="fe fe-star-o text-secondary"></i>
                                </td>

                                <td>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit
                                </td>
                                <td>2 Nov 2019<br> <small>08.50 AM</small></td>
                                <td class="text-right">
                                    <div class="actions">
                                        <a class="btn btn-sm bg-danger-light" data-toggle="modal" href="#delete_modal">
                                            <i class="fe fe-trash"></i> Delete
                                        </a>

                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h2 class="table-avatar">
                                        <a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{asset('doccure/admin/assets/img/patients/patient3.jpg')}}" alt="User Image"></a>
                                        <a href="profile.html">Carl Kelly</a>
                                    </h2>
                                </td>

                                <td>
                                    <h2 class="table-avatar">
                                        <a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{asset('doccure/admin/assets/img/doctors/doctor-thumb-03.jpg')}}" alt="User Image"></a>
                                        <a href="profile.html">Dr. Deborah Angel</a>
                                    </h2>
                                </td>

                                <td>
                                    <i class="fe fe-star text-warning"></i>
                                    <i class="fe fe-star text-warning"></i>
                                    <i class="fe fe-star text-warning"></i>
                                    <i class="fe fe-star text-warning"></i>
                                    <i class="fe fe-star-o text-secondary"></i>
                                </td>

                                <td>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit
                                </td>
                                <td>1 Nov 2019<br> <small>02.59 PM</small></td>
                                <td class="text-right">
                                    <div class="actions">
                                        <a class="btn btn-sm bg-danger-light" data-toggle="modal" href="#delete_modal">
                                            <i class="fe fe-trash"></i> Delete
                                        </a>

                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h2 class="table-avatar">
                                        <a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{asset('doccure/admin/assets/img/patients/patient4.jpg')}}" alt="User Image"></a>
                                        <a href="profile.html"> Michelle Fairfax</a>
                                    </h2>
                                </td>


                                <td>
                                    <h2 class="table-avatar">
                                        <a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{asset('doccure/admin/assets/img/doctors/doctor-thumb-04.jpg')}}" alt="User Image"></a>
                                        <a href="profile.html">Dr. Sofia Brient</a>
                                    </h2>
                                </td>

                                <td>
                                    <i class="fe fe-star text-warning"></i>
                                    <i class="fe fe-star text-warning"></i>
                                    <i class="fe fe-star text-warning"></i>
                                    <i class="fe fe-star text-warning"></i>
                                    <i class="fe fe-star-o text-secondary"></i>
                                </td>

                                <td>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit
                                </td>
                                <td>27 Sep 2019 <br><small>03.40 PM</small></td>
                                <td class="text-right">
                                    <div class="actions">
                                        <a class="btn btn-sm bg-danger-light" data-toggle="modal" href="#delete_modal">
                                            <i class="fe fe-trash"></i> Delete
                                        </a>

                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h2 class="table-avatar">
                                        <a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{asset('doccure/admin/assets/img/patients/patient5.jpg')}}" alt="User Image"></a>
                                        <a href="profile.html">Gina Moore</a>
                                    </h2>
                                </td>

                                <td>
                                    <h2 class="table-avatar">
                                        <a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{asset('doccure/admin/assets/img/doctors/doctor-thumb-05.jpg')}}" alt="User Image"></a>
                                        <a href="profile.html">Dr. Marvin Campbell</a>
                                    </h2>
                                </td>

                                <td>
                                    <i class="fe fe-star text-warning"></i>
                                    <i class="fe fe-star text-warning"></i>
                                    <i class="fe fe-star text-warning"></i>
                                    <i class="fe fe-star text-warning"></i>
                                    <i class="fe fe-star-o text-secondary"></i>
                                </td>

                                <td>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit
                                </td>
                                <td>24 Sep 2019 <br><small>04.38 PM</small></td>
                                <td class="text-right">
                                    <div class="actions">
                                        <a class="btn btn-sm bg-danger-light" data-toggle="modal" href="#delete_modal">
                                            <i class="fe fe-trash"></i> Delete
                                        </a>

                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h2 class="table-avatar">
                                        <a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{asset('doccure/admin/assets/img/patients/patient6.jpg')}}" alt="User Image"></a>
                                        <a href="profile.html">Elsie Gilley</a>
                                    </h2>
                                </td>

                                <td>
                                    <h2 class="table-avatar">
                                        <a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{asset('doccure/admin/assets/img/doctors/doctor-thumb-06.jpg')}}" alt="User Image"></a>
                                        <a href="profile.html">Dr. Katharine Berthold</a>
                                    </h2>
                                </td>
                                <td>
                                    <i class="fe fe-star text-warning"></i>
                                    <i class="fe fe-star text-warning"></i>
                                    <i class="fe fe-star text-warning"></i>
                                    <i class="fe fe-star text-warning"></i>
                                    <i class="fe fe-star-o text-secondary"></i>
                                </td>

                                <td>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit
                                </td>
                                <td>22 Aug 2019 <br><small>01.50 PM</small></td>
                                <td class="text-right">
                                    <div class="actions">
                                        <a class="btn btn-sm bg-danger-light" data-toggle="modal" href="#delete_modal">
                                            <i class="fe fe-trash"></i> Delete
                                        </a>

                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h2 class="table-avatar">
                                        <a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{asset('doccure/admin/assets/img/patients/patient7.jpg')}}" alt="User Image"></a>
                                        <a href="profile.html">Joan Gardner</a>
                                    </h2>
                                </td>
                                <td>
                                    <h2 class="table-avatar">
                                        <a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{asset('doccure/admin/assets/img/doctors/doctor-thumb-07.jpg')}}" alt="User Image"></a>
                                        <a href="profile.html">Dr. Linda Tobin</a>
                                    </h2>
                                </td>

                                <td>
                                    <i class="fe fe-star text-warning"></i>
                                    <i class="fe fe-star text-warning"></i>
                                    <i class="fe fe-star text-warning"></i>
                                    <i class="fe fe-star text-warning"></i>
                                    <i class="fe fe-star-o text-secondary"></i>
                                </td>

                                <td>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit
                                </td>
                                <td>21 Jul 2019 <br><small>05.50 PM</small></td>
                                <td class="text-right">
                                    <div class="actions">
                                        <a class="btn btn-sm bg-danger-light" data-toggle="modal" href="#delete_modal">
                                            <i class="fe fe-trash"></i> Delete
                                        </a>

                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h2 class="table-avatar">
                                        <a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{asset('doccure/admin/assets/img/patients/patient8.jpg')}}" alt="User Image"></a>
                                        <a href="profile.html">Daniel Griffing</a>
                                    </h2>
                                </td>
                                <td>
                                    <h2 class="table-avatar">
                                        <a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{asset('doccure/admin/assets/img/doctors/doctor-thumb-08.jpg')}}" alt="User Image"></a>
                                        <a href="profile.html">Dr. Paul Richard</a>
                                    </h2>
                                </td>
                                <td>
                                    <i class="fe fe-star text-warning"></i>
                                    <i class="fe fe-star text-warning"></i>
                                    <i class="fe fe-star text-warning"></i>
                                    <i class="fe fe-star text-warning"></i>
                                    <i class="fe fe-star-o text-secondary"></i>
                                </td>

                                <td>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit
                                </td>
                                <td>16 Jun 2019 <br><small>04.50 PM</small></td>
                                <td class="text-right">
                                    <div class="actions">
                                        <a class="btn btn-sm bg-danger-light" data-toggle="modal" href="#delete_modal">
                                            <i class="fe fe-trash"></i> Delete
                                        </a>

                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h2 class="table-avatar">
                                        <a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{asset('doccure/admin/assets/img/patients/patient9.jpg')}}" alt="User Image"></a>
                                        <a href="profile.html">Walter Roberson</a>
                                    </h2>
                                </td>

                                <td>
                                    <h2 class="table-avatar">
                                        <a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{asset('doccure/admin/assets/img/doctors/doctor-thumb-09.jpg')}}" alt="User Image"></a>
                                        <a href="profile.html">Dr. John Gibbs</a>
                                    </h2>
                                </td>
                                <td>
                                    <i class="fe fe-star text-warning"></i>
                                    <i class="fe fe-star text-warning"></i>
                                    <i class="fe fe-star text-warning"></i>
                                    <i class="fe fe-star text-warning"></i>
                                    <i class="fe fe-star-o text-secondary"></i>
                                </td>

                                <td>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit
                                </td>
                                <td>11 Mar 2019 <br><small>05.55 PM</small></td>
                                <td class="text-right">
                                    <div class="actions">
                                        <a class="btn btn-sm bg-danger-light" data-toggle="modal" href="#delete_modal">
                                            <i class="fe fe-trash"></i> Delete
                                        </a>

                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h2 class="table-avatar">
                                        <a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{asset('doccure/admin/assets/img/patients/patient10.jpg')}}" alt="User Image"></a>
                                        <a href="profile.html">Harry Williams</a>
                                    </h2>
                                </td>
                                <td>
                                    <h2 class="table-avatar">
                                        <a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{asset('doccure/admin/assets/img/doctors/doctor-thumb-10.jpg')}}" alt="User Image"></a>
                                        <a href="profile.html">Dr. Olga Barlow</a>
                                    </h2>
                                </td>

                                <td>
                                    <i class="fe fe-star text-warning"></i>
                                    <i class="fe fe-star text-warning"></i>
                                    <i class="fe fe-star text-warning"></i>
                                    <i class="fe fe-star text-warning"></i>
                                    <i class="fe fe-star-o text-secondary"></i>
                                </td>

                                <td>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit
                                </td>
                                <td>15 Feb 2019 <br><small>07.30 PM</small></td>
                                <td class="text-right">
                                    <div class="actions">
                                        <a class="btn btn-sm bg-danger-light" data-toggle="modal" href="#delete_modal">
                                            <i class="fe fe-trash"></i> Delete
                                        </a>

                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <!-- Datatables JS -->
    <script src="{{asset('doccure/admin/assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('doccure/admin/assets/plugins/datatables/datatables.min.js')}}"></script>
@endsection
