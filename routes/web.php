<?php

// use App\Http\Controllers\Admin\AdminController;
// use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;


Route::get('/', function (){
    return view('home');
});

Route::redirect('/admin', '/login');

Route::get('/login', [LoginController::class, 'create'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('login.store');
Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');

// Inhabilitados porque no se permite el registro de usuarios desde la web
// Route::get('/register', [RegisterController::class, 'create'])->name('register');
// Route::post('/register', [RegisterController::class, 'store'])->name('register.store');




Route::prefix('admin')->middleware('auth')->group(function () 
{
    require __DIR__ . '/admin.php';
});