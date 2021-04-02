<?php

use App\Http\Controllers\Auth;
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

Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('library', function () {
    return view('pages.library');
})->name('library');

Route::get('our_team', function () {
    return view('pages.team');
})->name('our_team');

Route::get('bio', function () {
    return view('pages.bio');
})->name('bio');

Route::get('course', function () {
    return view('pages.courses.course');
})->name('course');

Route::get('courses', function () {
    return view('pages.courses.all');
})->name('courses');

Route::get('tutors', function () {
    return view('pages.tutors.all');
})->name('tutors');

Route::get('tutors_bio', function () {
    return view('pages.tutors.bio');
})->name('tutors_bio');


Route::get('login', [Auth::class, 'login']);

Route::post('login', [Auth::class, 'authenticateUser'])->name('authenticate_user');

Route::get('register', [Auth::class, 'register'])->name('register');

Route::post('register', [Auth::class, 'newUserRegistration'])->name('new_registration');

Route::get('logout', [Auth::class, 'logout']);
