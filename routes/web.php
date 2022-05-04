<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\LoginController;
use App\Http\Controllers\User\RegisterController;
use App\Http\Controllers\User\CourseController;
use App\Http\Controllers\User\LessonController;
use App\Http\Controllers\User\ReviewController;
use App\Http\Controllers\User\UserController;

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

Route::get('/', [HomeController::class, 'index'])->name('homepage');

Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/register', [RegisterController::class, 'store'])->name('register');
Route::get('/getreviews', [CourseController::class, 'getreviews']);
Route::resource('courses', CourseController::class)->only('index');

Route::group(['middleware' => 'checklogin'], function () {
    Route::resource('courses', CourseController::class)->except('index');
    Route::resource('courses', CourseController::class)->only('store')->middleware('joincourse');
    Route::resource('courses.lessons', LessonController::class);
    Route::post('/reviews', [ReviewController::class, 'store'])->name('storereviews');
    Route::get('/getprofile', [UserController::class, 'profile'])->name('getprofile');
    Route::post('/editprofile', [UserController::class, 'update'])->name('editprofile');
    Route::post('/updateAvatar', [UserController::class, 'updateAvatar']);
});
