<?php

use App\Http\Controllers\ZipCodeController;
use Illuminate\Support\Facades\Route;

Route::get('zip-codes/{zip_code}', [ZipCodeController::class, 'show']);
