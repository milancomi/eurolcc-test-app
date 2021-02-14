<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;




Route::get('/', [HomeController::class, 'index']);
Route::get('home',[HomeController::class,'index'])->name('home.index');



Route::get('assigments',[ProjectController::class,'index'])->name('assignment.create');
Route::post('assignment',[ProjectController::class,'create'])->name("asssignment.store");


Route::get('tasks',[TaskController::class,'index'])->name('task.create');
Route::post('task',[TaskController::class,'create'])->name("task.store");


