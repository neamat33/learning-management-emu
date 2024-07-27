<?php

use Illuminate\Support\Facades\Artisan;
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
Route::get('clear', function () {
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    return redirect('/');
});
require('admin.php');
//web route
Route::get('/', [\App\Http\Controllers\FrontendController::class, 'index'])->name('home.index');
Route::get('/courses', [\App\Http\Controllers\FrontendController::class, 'coursePage'])->name('course.page');
Route::get('/course/details/{id}', [\App\Http\Controllers\FrontendController::class, 'courseDetailsPage'])->name('course.details.page');

Route::get('/dashboard', [\App\Http\Controllers\StudentDashboardController::class, 'dashboard'])->name('student.dashboard.page');
Route::get('/course_list', [\App\Http\Controllers\StudentDashboardController::class, 'courseList'])->name('student_course.list');
Route::get('/course_details', [\App\Http\Controllers\StudentDashboardController::class, 'courseDetails'])->name('student_course.details');
Route::get('/quiz', [\App\Http\Controllers\StudentDashboardController::class, 'quiz'])->name('student_course.quiz');
Route::get('/profile_update', [\App\Http\Controllers\StudentDashboardController::class, 'updateProfile'])->name('student_profile.update');


//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
