<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdministratorController;
use App\Http\Controllers\CrudController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TechnicalController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('create', [CrudController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth', 'role:administrator']], function(){
    Route::get('/admin', [AdministratorController::class, 'index'])->name('admin');
});

Route::group(['middleware' => ['auth', 'role:technical|administrator']], function(){
    Route::get('/technical', [TechnicalController::class, 'index'])->name('technical');
    Route::get('/admin', [AdministratorController::class, 'index'])->name('admin');
});

Route::group(['middleware' => ['auth', 'role:administrator|user']], function(){
    Route::get('/user', [UserController::class, 'index'])->name('user');
    Route::get('/admin', [AdministratorController::class, 'index'])->name('admin');
});

// routes/web.php


    Route::get('/admin/index', [AdminController::class, 'index'])->name('admin.index');
    Route::post('/admin/store', [AdminController::class, 'store'])->name('admin.store');
    Route::get('/admin/edit/{id}', [AdminController::class, 'edit'])->name('admin.edit');
    Route::get('/admin/show/{id}', [AdminController::class, 'show'])->name('admin.show');
    Route::put('/admin/update/{id}', [AdminController::class, 'update'])->name('admin.update');

    Route::delete('/admin/destroy/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');
    Route::get('/admin/create', [AdminController::class, 'create'])->name('admin.create');
    Route::post('/admin', [AdminController::class, 'store'])->name('admin.store');

    Route::get('/roles/{id}', [RoleController::class, 'show'])->name('roles.show');


