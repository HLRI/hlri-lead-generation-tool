<?php

use App\Http\Controllers\Admin\RecordTools\RecordToolsController;
use App\Models\Site;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

header('Access-Control-Allow-Origin', '*');
header('Access-Control-Allow-Headers: Authorization, Content-Type');

Route::get('/form-tools/{token}', function (Request $request) {
    
    $is_token = Site::where('token', $request->token)->first();
    if (empty($is_token)) {
        return;
    }
    $token = $request->token;

    if ($token == '8ie8nb6cwa') {
        return view('testfront.tools.form', compact(['token']));
    } else {
        return view('front.tools.form', compact(['token']));
    }

});
