<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/test', function () {
    return 'Test route is working!';
});
Route::middleware(['web'])->group(function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/user', [AuthController::class, 'user']);
    Route::post('/logout', [AuthController::class, 'logout']);
});


// Grupo para administradores
Route::middleware(['auth:sanctum', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/users', [AdminController::class, 'searchUser'])->name('admin.search.users');
    Route::post('/users/create', [AdminController::class, 'createUser'])->name('admin.users.create');
    Route::post('/users/update/{id}', [AdminController::class, 'updateUser'])->name('admin.users.update');
    Route::delete('/users/delete/{id}', [AdminController::class, 'deleteUser'])->name('admin.users.delete');
    Route::get('/users/{id}', [AdminController::class, 'showUser'])->name('admin.users.get');
});

// Grupo para estudiantes
Route::middleware(['auth:sanctum', 'role:student'])->prefix('student')->group(function () {
    Route::get('/dashboard', [StudentController::class, 'dashboard'])->name('student.dashboard');
});