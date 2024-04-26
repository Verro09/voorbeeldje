<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::get('/information', [\App\Http\Controllers\InformationController::class, 'index']);
Route::post('/information', [\App\Http\Controllers\InformationController::class, 'store']);
