<?php

use App\Models\Site;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/form-tools/{token}', function (Request $request) {
    $is_token = Site::where('token', $request->token)->first();
    if (empty($is_token)) {
        return;
    }
    $token = $request->token;
    return view('front.tools.form', compact(['token']));
});