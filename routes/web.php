<?php

use App\Http\Controllers\SalesController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', [SalesController::class, 'index'])->name('dashboard.sales');
Route::redirect('/', '/dashboard');
