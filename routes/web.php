<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ServiceCategoryController;
use App\Http\Controllers\ServiceController;

Route::resource('services', ServiceController::class);
Route::resource('service-categories', ServiceCategoryController::class);
Route::resource('roles', RoleController::class);
Route::resource('users', UserController::class); // Nuevo
Route::get('/', function () {
    return view('welcome');
});
