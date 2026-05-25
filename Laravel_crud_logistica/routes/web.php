<?php

use App\Http\Controllers\SucursalController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/sucursals');

Route::resource('sucursals', SucursalController::class);
