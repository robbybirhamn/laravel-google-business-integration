<?php

use App\Http\Controllers\GoogleMyBusinessController;
use Illuminate\Support\Facades\Route;

Route::get('/', [GoogleMyBusinessController::class, 'getRelatedBusinesses']);
