<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('cms/admin')->group(function () {
    Route::view('/error-404', 'admin.error-404')->name('admin.error-404');
    Route::view('/error-500', 'admin.error-500')->name('admin.error-500');
});

Route::prefix('cms/doctor')->group(function () {
    Route::view('/appointments', 'doctor.appointments')->name('doctor.appointments');
    Route::view('/my-patients', 'doctor.my-patients')->name('doctor.my-patients');
    Route::view('/schedule-timings', 'doctor.schedule-timings')->name('doctor.schedule-timings');
    Route::view('/invoices', 'doctor.invoices')->name('doctor.invoices');
    Route::view('/invoice-view', 'doctor.invoice-view')->name('doctor.invoice-view');
    Route::view('/reviews', 'doctor.reviews')->name('doctor.reviews');
    Route::view('/profile-settings', 'doctor.profile-settings')->name('doctor.profile-settings');
    Route::view('/social-media', 'doctor.social-media')->name('doctor.social-media');
    Route::view('/change-password', 'doctor.change-password')->name('doctor.change-password');
    //    Route::view('/', 'doctor.parent')->name('doctor.dashboard');
});

Route::prefix('cms/patient')->group(function () {
    Route::view('/change-password', 'patient.change-password')->name('patient.change-password');
    Route::view('/profile-settings', 'patient.profile-settings')->name('patient.profile-settings');
    Route::view('/favourites', 'patient.favourites')->name('patient.favourites');
});





Route::prefix('cms/admin')->namespace('Auth')->group(function () {
    Route::get('/login', 'AdminAuthController@showLoginView')->name('admin.login_view');
    Route::post('/login', 'AdminAuthController@login')->name('admin.login');
});

Route::prefix('cms/admin')->middleware('auth:admin')->group(function () {
    Route::view('/', 'admin.dashboard')->name('admin.dashboard');
    Route::get('/logout', 'Auth\AdminAuthController@logout')->name('admin.logout');
});

Route::prefix('cms/admin')->middleware('auth:admin')->group(function () {
    Route::resource('admins', 'AdminController');
    Route::resource('cities', 'CityController');
    Route::resource('states', 'StateController');
    Route::resource('specialities', 'SpecialityController');
    Route::resource('doctors', 'DoctorController');
    Route::resource('patients', 'PatientController');
    Route::resource('appointments', 'AppointmentController');
});

Route::prefix('cms/admin')->middleware('auth:admin')->group(function () {
    Route::get('cities/{id}/states', 'CityController@showStates')->name('cities.states');
    Route::get('admins/{id}', 'AdminController@profile')->name('admin.show');
    Route::get('listevent', 'AppointmentController@listEvetn')->name('allEvent');
});





Route::prefix('cms/doctor')->namespace('Auth')->middleware('logout')->group(function () {
    Route::get('/login', 'DoctorAuthController@showLoginView')->name('doctor.login_view');
    Route::post('/login', 'DoctorAuthController@login')->name('doctor.login');
});

Route::prefix('cms/doctor')->middleware('auth:doctor')->group(function () {
    Route::view('/', 'doctor.dashboard')->name('doctor.dashboard');
    Route::get('/logout', 'Auth\DoctorAuthController@logout')->name('doctor.logout');
});



Route::prefix('cms/patient')->namespace('Auth')->group(function () {
    Route::get('/login', 'PatientAuthController@showLoginView')->name('patient.login_view');
    Route::post('/login', 'PatientAuthController@login')->name('patient.login');
});

Route::prefix('cms/patient')->middleware('auth:patient')->group(function () {
    Route::view('/', 'patient.dashboard')->name('patient.dashboard');
    Route::get('/logout', 'Auth\PatientAuthController@logout')->name('patient.logout');
});
