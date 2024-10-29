<?php

use App\Http\Controllers\PerceptualHashController;
use Illuminate\Support\Facades\Route;

Route::get('/perceptual-hash', [PerceptualHashController::class, 'show']);
