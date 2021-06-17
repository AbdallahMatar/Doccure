@extends('admin.parent')

@section('title', 'Appointments')

@section('style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.6.0/main.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    {{-- <style>
        .fc .fc-button-primary,
        .fc .fc-button-primary:not(:disabled).fc-button-active,
        .fc .fc-button-primary:disabled {
            background-color: #1b5a90;
            border: none
        }

        .fc .fc-button-group > .fc-button:hover{
            background-color: #00d0f1;
        }

    </style> --}}
@endsection

@section('page-title', 'Appointments')
@section('page-breadcrumb', 'Appointments')

@section('page-wrapper')

    <div class="container">
        <div id="calendar"></div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="evanto" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('appointments.store') }}" method="POST" id="create_appointments_form">
                        <span id="aaa"></span>
                        @csrf
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" class="form-control date_biker" id="title" name="title"
                                value="{{ old('title') }}">
                        </div>
                        <div class="form-group">
                            <label>Start Time</label>
                            <input type="datetime" class="form-control date_biker" id="published_at" name="start" id="start"
                                value="{{ old('start') }}" style="background-color: #ffffff;">
                        </div>
                        <div class="form-group">
                            <label>End Time</label>
                            <input type="datetime" class="form-control date_biker" id="published_at" name="end" id="end"
                                value="{{ old('end') }}" style="background-color: #ffffff;">
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" class="form-control" name="price" id="price" placeholder="Price">
                        </div>
                        <div class="form-group">
                            <label for="doctor_id">Doctor</label>
                            <select class="form-control" name="doctor_id" id="doctor_id">
                                <option>--Select--</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="patient_id">Patient</label>
                            <select class="form-control" name="patient_id" id="patient_id">
                                <option>--Select--</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.6.0/main.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <script>
        flatpickr('#published_at', {
            enableTime: true
        })

        let doctors;

        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                selectable: true,
                editable: true,
                height: 650,
                showNonCurrentDates: false,
                editable: false,
                defaultView: 'month',
                yearColumns: 3,
                locale: 'en',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,dayGrid,timeGrid'
                },

                events: "{{ route('allEvent') }}",

                dateClick: function(info) {
                    $('#evanto').modal('show');
                    if (!doctors) {
                        axios.get('http://127.0.0.1:8000/cms/admin/appointments/create')
                            .then(function(response) {
                                // handle success
                                let doctorSelect = document.querySelector('#doctor_id');
                                doctors = response.data.doctors.length;


                                for (let i = 0; i < response.data.doctors.length; i++) {
                                    var dataDoctor = response.data.doctors[i];
                                    doctorSelect.innerHTML += `<option value="${dataDoctor.id}"> ${dataDoctor.first_name} ${dataDoctor.last_name}</option>`

                                }


                                let patientSelect = document.querySelector('#patient_id');

                                for (let i = 0; i < response.data.patients.length; i++) {
                                    var dataPatient = response.data.patients[i];
                                    patientSelect.innerHTML += `<option value="${dataPatient.id}"> ${dataPatient.first_name} ${dataPatient.last_name}</option>`

                                }
                            })
                            .catch(function(error) {
                                // handle error
                                console.log(error);
                            })
                            .then(function() {
                                // always executed
                            });
                    }

                },

                // eventClick: function(info) {

                //     var event = info.event;
                //     $('#evanto').modal('show');

                //     axios.get('http://127.0.0.1:8000/cms/admin/appointments/' + event.id + '/edit')
                //         .then(function(response) {
                //             console.log(response);
                //             // handle success

                //             $('#title').val(response.data.title);


                //         })
                //         .catch(function(error) {
                //             // handle error
                //             console.log(error);
                //         })
                //         .then(function() {
                //             // always executed
                //         });
                // }
            });
            calendar.render();
        });

        function confirmDelete(app, id) {
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

        function deleteAdmin(app, id) {
            axios.delete('/cms/admin/admins/' + id)
                .then(function(response) {
                    // handle success
                    app.closest('tr').remove();
                    showMessage(response.data);
                })
                .catch(function(error) {
                    // handle error
                    showMessage(error.response.data);
                })
                .then(function() {
                    // always executed
                });
        }

        function showMessage(data) {
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
