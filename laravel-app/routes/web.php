<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KelompokController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\TaskController;

// Home Route
Route::get('/', function () {
    return view('welcome');
});

// Auth Routes
Route::prefix('auth')->group(function () {
    Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [RegisterController::class, 'register']);
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login']);
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});

// Home Route
Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home');

// Project Routes
Route::get('/projects/{id}', [ProjectController::class, 'show'])->name('projects.show');
Route::get('/create/project', [ProjectController::class, 'create'])->name('project.create');
Route::post('/create/project', [ProjectController::class, 'store'])->name('project.store');
Route::get('/project/{project}/edit', [ProjectController::class, 'edit'])->name('project.edit');
Route::get('/edit/project/{id}', [ProjectController::class, 'edit'])->name('projects.edit');
Route::put('/projects/{id}', [ProjectController::class, 'update'])->name('projects.update');




// Kelompok Routes
Route::get('/kelompok/create', [KelompokController::class, 'create'])->name('kelompok.create');
Route::post('/kelompok', [KelompokController::class, 'store'])->name('kelompok.store');

// Join Kelompok Routes
Route::get('/join-kelompok', [UserController::class, 'showJoinKelompokForm'])->name('join.kelompok.form')->middleware('auth');
Route::post('/join-kelompok', [UserController::class, 'joinKelompok'])->name('join.kelompok')->middleware('auth');
Route::post('/keluar-kelompok', [UserController::class, 'keluarKelompok'])->name('keluar.kelompok');

// Password Reset Routes
Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

// Comments Routes
Route::post('/projects/{project}/comments', [CommentController::class, 'store'])->name('comments.store');

// Redirect for Dashboard
Route::redirect('/dashboard', '/home');
//Task
Route::get('/create/tasks', [TaskController::class, 'create'])->name('tasks.create'); 
Route::put('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');
Route::resource('tasks', TaskController::class)->except(['create']); 
Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
Route::put('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');