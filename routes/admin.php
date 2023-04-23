<?php

use Illuminate\Support\Facades\Route;

Route::get('panel', [App\Http\Controllers\HomeController::class, 'index'])->name('panel');
