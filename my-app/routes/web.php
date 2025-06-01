<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UnitKerjaController;


Route::get('/', function () {
    return view('welcome');
});


Route::get('/unit-kerja', [UnitKerjaController::class, 'index']);