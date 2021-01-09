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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/showapplayedemployee', [App\Http\Controllers\CompanyController::class, 'index'])->name('showapplaied');


Route::get('/post', [App\Http\Controllers\PostController::class, 'create'])->name('post');
Route::post('/storepost', [App\Http\Controllers\PostController::class, 'store'])->name('go');
Route::get('/profileemployee', [App\Http\Controllers\EmployeeController::class, 'make'])->name('profile');
Route::post('/applay/{post}/user', [App\Http\Controllers\EmployeeController::class, 'applay'])->name('applay');
Route::post('/enterdata', [App\Http\Controllers\EmployeeController::class, 'save'])->name('save');
Route::post('AcceptTheEmployee/{post}/{cv}',[App\Http\Controllers\CompanyController::class, 'Accept'])->name('Accept');
Route::get('Notification', [App\Http\Controllers\EmployeeController::class, 'notification'])->name('notification');


