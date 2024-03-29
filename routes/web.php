<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\Auth;
use App\Http\Controllers\General;
use App\Http\Controllers\User;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

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

Route::get('test', function () {

    $dateSrc = ' 01:50 pm ';
    // $dateTime = new DateTime($dateSrc);

    print_r(range("A", "Z"));
});

Route::domain('admin.' . env('APP_URL'))->group(function () {
    Route::get('/', [Admin::class, 'logs']);
    Route::post('create_course', [Admin::class, 'createCourse'])->name('create_course');
    Route::post('update_course', [Admin::class, 'updateCourse'])->name('update_course');
    Route::post('delete_course', [Admin::class, 'deleteCourse'])->name('delete_course');
    Route::post('create_event', [Admin::class, 'createEvent'])->name('create_event');
    Route::post('update_event', [Admin::class, 'updateEvent'])->name('update_event');
    Route::post('delete_event', [Admin::class, 'deleteEvent'])->name('delete_event');
    Route::post('create_class', [Admin::class, 'createClass'])->name('create_class');
    Route::post('update_class', [Admin::class, 'updateClass'])->name('update_class');
    Route::post('delete_class', [Admin::class, 'deleteClass'])->name('delete_class');
});

Route::domain(env('APP_URL'))->group(function () {

    Route::get('/', [General::class, 'index'])->name('home');

    Route::get('event/{upcoming:link_id}', [General::class, 'upcoming'])->name('event');

    Route::get('class/{classes:link_id}', [General::class, 'classDetails'])->name('class');

    // Route::get('register_class/{classes:link_id}', [General::class, 'classDetails']);

    Route::get('make_payment/{classes:link_id}', [General::class, 'makePayment'])->name('make_payment');

    Route::get('confirm_payment', [General::class, 'confirmPayment'])->name('confirm_payment');

    Route::get('courses/{course}', [General::class, 'courses'])->name('course_info');

    Route::get('blog', function () {
        return redirect()->away('https://blog.midastouchacademy.com');
    });

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

    Route::post('comment/{article}', [ArticlesController::class, 'comment'])->name('comment');

    // * Only the author of an article can preview it
    Route::get('articles/preview/{article}', [ArticlesController::class, 'previewPost'])->name('preview');

    Route::resource('articles', ArticlesController::class);

    Route::get('dashboard', [User::class, 'profile'])->name('dashboard');

    Route::get('dashboard/profile', [User::class, 'profile'])->name('my_profile');

    Route::get('dashboard/settings', [User::class, 'settings'])->name('settings');

    Route::post('update_profile', [User::class, 'updateProfile'])->name('update_profile');

    Route::post('upload_profile_pix', [User::class, 'setProfilePix'])->name('upload_profile_pix');

    Route::post('change_password', [User::class, 'changePassword'])->name('update_password');

    Route::get('login', [Auth::class, 'login'])->name('login');

    Route::post('login', [Auth::class, 'authenticateUser'])->name('authenticate_user');

    Route::post('register', [Auth::class, 'newUserRegistration'])->name('new_registration');

    Route::get('verify', [Auth::class, 'verifyEmail']);

    Route::post('reverify', [Auth::class, 'resendVerificationMail'])->name('reverify');

    Route::post('forgot_password', [Auth::class, 'forgotPassword'])->name('forgot_password');

    Route::get('reset_password', [Auth::class, 'resetPassword'])->name('reset_password');

    Route::post('reset_password/{token}', [Auth::class, 'changePassword'])->name('change_password');

    Route::get('logout', [Auth::class, 'logout']);

    // * testing mail function locally
    Route::get('/mailable', function () {
        return new App\Mail\SendMail('registration', '1254');
    });

    Route::get('oauth', function () {
        return Socialite::driver('google')->redirect();
    })->name('oauth-google');

    Route::get('oauth-verify', [Auth::class, 'oAuth']);
});
