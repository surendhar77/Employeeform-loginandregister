<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('index',[HomeController::class,'index'])->name('/');
Route::get('create',[HomeController::class,'create'])->name('employee.create');
Route::post('store',[HomeController::class,'store'])->name('employee.store');
Route::get('download/{id}',[HomeController::class,'download'])->name('download');
Route::get('edit/{id}',[HomeController::class,'edit'])->name('employee.edit');
Route::post('update/{id}',[HomeController::class,'update'])->name('employee.update');
Route::delete('delete/{id}',[HomeController::class,'delete'])->name('employee.delete');

// Login And Register

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post'); 
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post'); 
Route::get('dashboard', [AuthController::class, 'dashboard']); 
Route::get('logout', [AuthController::class, 'logout'])->name('logout');