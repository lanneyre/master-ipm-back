<?php

use App\Http\Controllers\AnimalController;
use App\Http\Controllers\CritereController;
use App\Http\Controllers\EspeceController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RaceController;
use App\Http\Controllers\GalerieController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TemoignageController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\BlockRoleMiddleware;
use App\Http\Middleware\OnlyAdminMiddleware;

Route::get('/', [HomeController::class, 'home']);
// Route::get('/iconService', [HomeController::class, 'imgService']);
// Route::get('/imgTem', [HomeController::class, 'imgTem']);
Route::post('/contact', [HomeController::class, 'contact'])->name('contact.submit');
Route::post('/login', [HomeController::class, 'login'])->name('login.submit');
Route::get('/logout', [HomeController::class, 'logout'])->name('login.logout');
Route::post('/register', [HomeController::class, 'register'])->name('register.submit');

// Route::get('/user', [UserController::class, 'show'])->name('user.showme');
Route::put('/user/{id}', [UserController::class, 'update'])->name('user.updateme');

Route::middleware(BlockRoleMiddleware::class)->group(function () {

    // ...
    Route::resources([
        "animal" => AnimalController::class,
        "critere" => CritereController::class,
        "service" => ServiceController::class,
        "temoignage" => TemoignageController::class,
        "race" => RaceController::class,
        "espece" => EspeceController::class,

    ]);
    Route::resources([
        "galerie" => GalerieController::class,
    ], ['only' => ["store", "destroy"]]);
});

Route::middleware(OnlyAdminMiddleware::class)->group(function () {

    // ...

    Route::resources([
        "user" => UserController::class,
    ], ["exept" => "update"]);
});
