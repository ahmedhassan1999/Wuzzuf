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





Route::get('/profileemployee', [App\Http\Controllers\EmployeeController::class, 'make'])->name('profile');
Route::post('/applay/{post}/user', [App\Http\Controllers\EmployeeController::class, 'applay'])->name('applay');
Route::post('/enterdata', [App\Http\Controllers\EmployeeController::class, 'save'])->name('save');
Route::post('savecomment/{post_id}',[App\Http\Controllers\CommentController::class,'write_comment'])->name('write-comment');
Route::get('Notification', [App\Http\Controllers\EmployeeController::class, 'notification'])->name('notification');

