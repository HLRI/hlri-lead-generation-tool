<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

header('Access-Control-Allow-Origin', '*');
header('Access-Control-Allow-Headers: Authorization, Content-Type');

Auth::routes();


Route::get('/', function () {
    return view('tracking-code');
});

Route::get('/player', function () {
    return view('player');
});

Route::get('/changeUlrIframe', function () {
    return view('changeUlrIframe');
})->name('changeUlrIframe');
