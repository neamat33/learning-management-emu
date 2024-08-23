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
Route::get('/notice',[\App\Http\Controllers\FrontendController::class,'notice'])->name('notice.index');
Route::get('/buy/course',[\App\Http\Controllers\FrontendController::class,'cartPage'])->name('cart.index');
Route::post('/buy/course/store',[\App\Http\Controllers\FrontendController::class,'storeOrderData'])->name('store.buy.course');
Route::get('/success',[\App\Http\Controllers\FrontendController::class,'successPage'])->name('success.page');


require('admin.php');
require('student.php');





