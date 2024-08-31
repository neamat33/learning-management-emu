<?php

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Student\Auth\LoginController as StudentLoginController;
use App\Http\Controllers\StudentDashboardController;
use Illuminate\Support\Facades\Route;

//employee authentication system
//Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
//Route::post('register', [RegisterController::class, 'register']);
//Route::get('login', [EmployeeLoginController::class, 'showLoginForm'])->name('login');
//Route::post('login', [EmployeeLoginController::class, 'login']);

Route::get('register', [StudentLoginController::class, 'showRegistrationForm'])->name('student_register_page');
Route::post('register', [RegisterController::class, 'register'])->name('student_register');
Route::get('login', [StudentLoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [StudentLoginController::class, 'login']);
Route::post('logout', [StudentLoginController::class, 'logout'])->name('student.logout');
//Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
//Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
//Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
//Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');
////email verification
//Route::get('email/verify', [VerificationController::class, 'show'])->name('verification.notice');
//Route::get('email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify');
//Route::post('email/resend', [VerificationController::class, 'resend'])->name('verification.resend');

Route::group(['middleware' => ['auth:student', 'prevent-back-history']], function () {
    Route::get('/dashboard', [\App\Http\Controllers\StudentDashboardController::class, 'dashboard'])->name('dashboard.page');
    Route::get('/course_list', [\App\Http\Controllers\StudentDashboardController::class, 'courseList'])->name('course.list');
    Route::get('/course_details', [\App\Http\Controllers\StudentDashboardController::class, 'courseDetails'])->name('course.details');
    Route::get('/quiz', [\App\Http\Controllers\StudentDashboardController::class, 'quiz'])->name('course.quiz');
    Route::get('/my-profile', [\App\Http\Controllers\StudentDashboardController::class, 'showProfile'])->name('profile.update');
    Route::post('/profile_update/{id}', [\App\Http\Controllers\StudentDashboardController::class, 'updateProfile'])->name('my.profile.update');


});

Route::get('/image-download/{id}', [StudentDashboardController::class, 'downloadImage'])->name('download.image');
