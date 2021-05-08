<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\Auth;
use App\Http\Controllers\General;
use App\Http\Controllers\User;
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


Route::domain('admin.' . env('APP_URL'))->group(function () {
    Route::get('/', [Admin::class, 'logs']);
    Route::post('create_course', [Admin::class, 'createCourse'])->name('create_course');
    Route::post('update_course', [Admin::class, 'updateCourse'])->name('update_course');
    Route::post('delete_course', [Admin::class, 'deleteCourse'])->name('delete_course');
    Route::post('create_class', [Admin::class, 'createClass'])->name('create_class');
    Route::post('update_class', [Admin::class, 'deleteClass'])->name('delete_class');
});

Route::domain(env('APP_URL'))->group(function () {

    Route::get('/', [General::class, 'index'])->name('home');

    Route::get('event/{upcoming:link_id}', [General::class, 'upcoming'])->name('event');

    Route::get('courses/{course}', [General::class, 'courses'])->name('course_info');

    Route::get('about_us', function () {
        return view('pages.about');
    })->name('about');

    Route::get('/library', function () {
        return view('pages.library');
    })->name('library');

    Route::get('our_team', function () {
        return view('pages.team');
    })->name('our_team');

    Route::get('bio', function () {
        return view('pages.bio');
    })->name('bio');

    Route::get('courses', function () {
        return view('pages.courses.all');
    })->name('courses');

    Route::get('tutors', function () {
        return view('pages.tutors.all');
    })->name('tutors');

    Route::get('tutors_bio', function () {
        return view('pages.tutors.bio');
    })->name('tutors_bio');

    Route::get('become_a_tutor', function () {
        return view('pages.tutors.application');
    })->name('become_a_tutor');

    Route::get('dasboard', [User::class, 'profile'])->name('dashboard');

    Route::post('update_profile', [User::class, 'updateProfile'])->name('update_profile');

    Route::post('upload_profile_pix', [User::class, 'setProfilePix'])->name('upload_profile_pix');

    Route::post('change_password', [User::class, 'changePassword'])->name('update_password');

    Route::get('login', [Auth::class, 'login'])->name('login');

    Route::post('login', [Auth::class, 'authenticateUser'])->name('authenticate_user');

    Route::post('register', [Auth::class, 'newUserRegistration'])->name('new_registration');

    Route::get('verify', [Auth::class, 'verifyEmail']);

    Route::post('forgot_password', [Auth::class, 'forgotPassword'])->name('forgot_password');

    Route::get('reset_password', [Auth::class, 'resetPassword'])->name('reset_password');

    Route::post('reset_password/{token}', [Auth::class, 'changePassword'])->name('change_password');

    Route::get('logout', [Auth::class, 'logout']);

    Route::get('/mailable', function () {
        return new App\Mail\SendMail('registration', '1254');
    });
});
