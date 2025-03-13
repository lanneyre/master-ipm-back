<?php

use App\Http\Controllers\AnimalController;
use App\Http\Controllers\CritereController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resources([
    "animal" => AnimalController::class,
    "critere" => CritereController::class
]);
