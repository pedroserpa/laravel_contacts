<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ContactsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;

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

Route::get('/', [ContactsController::class, 'index'])->name('app_home');
Route::get('/detail/{id}', [ContactsController::class, 'show'])->name('app_contact_detail');

Route::get('/login', [LoginController::class, 'index'])->name('app_login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('app_login_process');
Route::get('/logout', [LoginController::class, 'logout'])->name('app_logout');
Route::get('/register', [UserController::class, 'index'])->name('app_register');
Route::post('/register', [UserController::class, 'register'])->name('app_register_process');

//Auth routes
Route::get('/new', [ContactsController::class, 'create'])->name('app_contact_create');
Route::post('/new', [ContactsController::class, 'store'])->name('app_contact_store');
Route::get('/edit/{id}', [ContactsController::class, 'edit'])->name('app_contact_edit');
Route::put('/edit/{id}', [ContactsController::class, 'update'])->name('app_contact_update');

Route::get('/delete/{id}', [ContactsController::class, 'destroy'])->name('app_contact_delete');