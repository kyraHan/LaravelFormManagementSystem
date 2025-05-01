<?php

use \App\Http\Controllers\FormController;
use \App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/',[FormController::class, 'index'])->middleware(['auth','verified'])->name('welcome');
Route::post('/',[FormController::class, 'indexInQuarriable'])->middleware(['auth','verified'])->name('welcomeInQuarriable');
Route::get('/createform',[FormController::class, 'create'])->middleware(['auth','verified'])->name('createform');
Route::post('/createform',[FormController::class, 'store'])->middleware(['auth','verified'])->name('createdform');
Route::get('/formdetail/{id}',[FormController::class, 'show'])->middleware(['auth','verified'])->name('editform');
Route::delete('/formdetail/{id}',[FormController::class, 'destroy'])->middleware(['auth','verified'])->name('deleteform');
Route::patch('/formdetail/{id}',[FormController::class, 'edit'])->middleware(['auth','verified'])->name('updateform');

Route::get('/users',[UserController::class, 'index'])->middleware(['auth','verified'])->name('users');
Route::get('/createuser',[UserController::class, 'create'])->middleware(['auth','verified'])->name('createuser');
Route::post('/createuser',[UserController::class, 'store'])->middleware(['auth','verified'])->name('createduser');
Route::get('/userdetail/{id}',[UserController::class, 'show'])->middleware(['auth','verified'])->name('edituser');
Route::delete('/userdetail/{id}',[UserController::class, 'destroy'])->middleware(['auth','verified'])->name('deleteuser');
Route::patch('/userdetail/{id}',[UserController::class, 'edit'])->middleware(['auth','verified'])->name('updateuser');


require __DIR__.'/auth.php';
