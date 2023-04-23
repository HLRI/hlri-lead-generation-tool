<?php

use App\Http\Controllers\Admin\Ajax\FormToolsAjaxController;
use App\Http\Controllers\Admin\FormTools\FormToolsController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('panel', [HomeController::class, 'index'])->name('panel');
Route::get('form-tools/list', [FormToolsController::class, 'index'])->name('form-tools.index');
Route::get('form-tools/create', [FormToolsController::class, 'create'])->name('form-tools.create');



Route::post('form-tools/store', [FormToolsAjaxController::class, 'store'])->name('form-tools.store');
