<?php

use App\Http\Controllers\AnimalController;
use App\Http\Controllers\CritereController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', [HomeController::class, 'home']);
// Route::get('/iconService', [HomeController::class, 'imgService']);
// Route::get('/imgTem', [HomeController::class, 'imgTem']);
Route::post('/contact', [HomeController::class, 'contact'])->name('contact.submit');
Route::post('/login', [HomeController::class, 'login'])->name('login.submit');
Route::get('/logout', [HomeController::class, 'logout'])->name('login.logout');
Route::post('/register', [HomeController::class, 'register'])->name('register.submit');


Route::resources([
    "animal" => AnimalController::class,
    "critere" => CritereController::class,
    "service" => ServiceController::class
]);
