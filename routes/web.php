<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Guest\TrainController;

Route::get('/', [TrainController::class, 'index'])->name('home');