<?php

use App\Http\Controllers\Admin\InfoController;
use App\Http\Controllers\Admin\RecordTools\RecordToolsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

header('Access-Control-Allow-Origin', '*');
header('Access-Control-Allow-Headers: Authorization, Content-Type');


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix'=>'v1'], function(){
    Route::get('/save-info', [InfoController::class, 'store'])->name('save-info');
    Route::get('/confirmPhone', [InfoController::class, 'confirmPhone'])->name('confirmPhone');
    Route::get('/resendCode', [InfoController::class, 'resendCode'])->name('resendCode');
    Route::get('/crm-info', [InfoController::class, 'crm'])->name('crm-info');
    Route::get('/record-tools/store', [RecordToolsController::class, 'store'])->name('record-tools.store');
});