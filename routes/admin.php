<?php

use App\Http\Controllers\Admin\Ajax\FormToolsAjaxController;
use App\Http\Controllers\Admin\FormTools\FormToolsController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('panel', [HomeController::class, 'index'])->name('panel');
Route::get('form-tools/list', [FormToolsController::class, 'index'])->name('form-tools.index');
Route::get('form-tools/create', [FormToolsController::class, 'create'])->name('form-tools.create');
Route::get('form-tools/show/{token}', [FormToolsController::class, 'show'])->name('form-tools.show');
Route::get('form-tools/code/{token}', [FormToolsController::class, 'code'])->name('form-tools.code');



Route::post('form-tools/store', [FormToolsAjaxController::class, 'store'])->name('form-tools.store');
