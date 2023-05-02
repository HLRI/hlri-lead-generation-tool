<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

header('Access-Control-Allow-Origin', '*');
header('Access-Control-Allow-Headers: Authorization, Content-Type');

Auth::routes();


Route::get('/tracking-code', function () {
    return view('tracking-code');
});

Route::get('/player', function () {
    return view('player');
});

Route::get('/changeUlrIframe/{socket_id}', function (Request $request) {
    $socket_id = $request->socket_id;
    return view('changeUlrIframe', compact(['socket_id']));
})->name('changeUlrIframe');
