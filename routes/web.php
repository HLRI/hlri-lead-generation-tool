<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;

header('Access-Control-Allow-Origin', '*');
header('Access-Control-Allow-Headers: Authorization, Content-Type');

Auth::routes();


Route::get('/tracking-code', function () {
    return view('tracking-code');
});

Route::get('/check-status', function () {

    try {
        $result = send_sms('+98919181', 'test', '123456');
        return $result;
    } catch (\Throwable $th) {
        return response('The number is not correct', 400);
    }

    // $ch = 'https://hlrihub.com/api/v1/lead-call';
    // $body = array(
    //     "name" => '$request->name',
    //     "email" => 'ehsan@gmail.com',
    //     "phone" => '+989191816172',
    //     "page" => '$request->url',
    //     "source" => '$request->source',
    //     "medium" => '$request->medium',
    //     "term" => '$request->term',
    //     "content" => '$request->content',
    //     "campaign" => '$request->campaign',
    //     "custom_source" => '$request->custom_source',
    //     "prName" => '$prn',
    // );
    // $head = [
    //     'Authorization' => 'Bearer ' . 'zR9U6n9fBsWw3zmnbGAl4f90ZcmJk2tenaqf11Yf',
    //     'Content-Type' => 'application/x-www-form-urlencoded; charset=utf-8',
    // ];
    // $response = Http::withHeaders($head)->post($ch, $body);


    // if($response->getStatusCode() == 201){
    //     $apisms = 'https://hlrihub.com/api/v1/confirmCode-sms';
    //     $body = array(
    //         "phone" => '+989191816172',
    //         "code" => '90605',
    //     );
    //     $head = [
    //         'Authorization' => 'Bearer ' . 'zR9U6n9fBsWw3zmnbGAl4f90ZcmJk2tenaqf11Yf',
    //         'Content-Type' => 'application/x-www-form-urlencoded; charset=utf-8',
    //     ];
    //     $response = Http::withHeaders($head)->post($apisms, $body);

    //     dd($response);
    // }



});

Route::get('/player', function () {
    return view('player');
});

Route::get('/changeUlrIframe/{socket_id}/{url}', function (Request $request) {
    $socket_id = $request->socket_id;
    $url = $request->url;
    return view('changeUlrIframe', compact(['socket_id', 'url']));
})->name('changeUlrIframe');
