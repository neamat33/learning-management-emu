<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Student\Auth\LoginController as StudentLoginController;

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
//web route
Route::get('/', [\App\Http\Controllers\FrontendController::class, 'index'])->name('home.index');
Route::get('/courses', [\App\Http\Controllers\FrontendController::class, 'coursePage'])->name('frontend.course.page');
Route::get('/about-us', [\App\Http\Controllers\FrontendController::class, 'aboutUs'])->name('frontend.about.page');
Route::get('/contact-us', [\App\Http\Controllers\FrontendController::class, 'contactUs'])->name('frontend.contact.page');
Route::get('/course/details/{id}', [\App\Http\Controllers\FrontendController::class, 'courseDetailsPage'])->name('course.details.page');
Route::post('/contact/store',[\App\Http\Controllers\FrontendController::class,'contactStore'])->name('contact.message.store');
require('admin.php');
require('student.php');





