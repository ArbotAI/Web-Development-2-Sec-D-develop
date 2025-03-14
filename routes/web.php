<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentsController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AuthMiddleware;

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Protect CRUD routes with AuthMiddleware
Route::middleware([AuthMiddleware::class])->group(function () {
    Route::get('/', [StudentsController::class, 'index'])->name('std.index');
    Route::post('/create-student', [StudentsController::class, 'newStd'])->name('std.create');
    Route::get('/edit-student/{id}', [StudentsController::class, 'editStd'])->name('std.edit');
    Route::post('/update-student/{id}', [StudentsController::class, 'updateStd'])->name('std.update');
    Route::get('/delete-student/{id}', [StudentsController::class, 'deleteStd'])->name('std.delete');
});
