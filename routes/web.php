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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function ()
{

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/daily_attendance_checkin', [App\Http\Controllers\attendance_controller::class, 'daily_attendance_checkin'])->name('daily_attendance_checkin');
Route::get('/daily_attendance_checkout', [App\Http\Controllers\attendance_controller::class, 'daily_attendance_checkout'])->name('daily_attendance_checkout');
Route::get('/shift_summery', [App\Http\Controllers\attendance_controller::class, 'shift_summery'])->name('shift_summery');
Route::get('/find_attend_summery', [App\Http\Controllers\attendance_controller::class, 'find_attend_summery'])->name('find_attend_summery');


// time off home
Route::get('/time_off_home', [App\Http\Controllers\leave_controller::class, 'time_off_home'])->name('time_off_home');
Route::POST('/submit_seek_leave', [App\Http\Controllers\leave_controller::class, 'submit_seek_leave'])->name('submit_seek_leave');
Route::POST('/submit_annual_leave', [App\Http\Controllers\leave_controller::class, 'submit_annual_leave'])->name('submit_annual_leave');


// profile
Route::get('/profile', [App\Http\Controllers\user_controller::class, 'profile'])->name('profile');
Route::POST('/update_profile', [App\Http\Controllers\user_controller::class, 'update_profile'])->name('update_profile');

});
