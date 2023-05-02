<?php

use App\Http\Controllers\Admin\Ajax\FormToolsAjaxController;
use App\Http\Controllers\Admin\Ajax\RecordToolsAjaxController;
use App\Http\Controllers\Admin\FormTools\FormToolsController;
use App\Http\Controllers\Admin\RecordTools\RecordToolsController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('panel', [HomeController::class, 'index'])->name('panel');
Route::get('form-tools/list', [FormToolsController::class, 'index'])->name('form-tools.index');
Route::get('form-tools/create', [FormToolsController::class, 'create'])->name('form-tools.create');
Route::get('form-tools/show/{token}', [FormToolsController::class, 'show'])->name('form-tools.show');
Route::get('form-tools/code/{token}', [FormToolsController::class, 'code'])->name('form-tools.code');

// Route::get('form-tools/live-data', [FormToolsController::class, 'live_data'])->name('form-tools.livedata');


Route::post('form-tools/store', [FormToolsAjaxController::class, 'store'])->name('form-tools.store');

Route::get('recording-tools/list', [RecordToolsController::class, 'index'])->name('recording-tools.index');
Route::get('recording-tools/sessions/{url}', [RecordToolsController::class, 'sessions'])->name('recording-tools.sessions');
Route::get('recording-tools/show/{session}', [RecordToolsController::class, 'show'])->name('recording-tools.show');
Route::get('recording-tools/dataset/{socket_id}', [RecordToolsAjaxController::class, 'dataset'])->name('dataset');

