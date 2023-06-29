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

        $ch = 'https://hlrihub.com/api/v1/lead-call';
        $body = array(
            "name" => '$request->name',
            "email" => 'ehsan@gmail.com',
            "phone" => '+989191816172',
            "page" => '$request->url',
            "source" => '$request->source',
            "medium" => '$request->medium',
            "term" => '$request->term',
            "content" => '$request->content',
            "campaign" => '$request->campaign',
            "custom_source" => '$request->custom_source',
            "prName" => '$prn',
        );
        $head = [
            'Authorization' => 'Bearer ' . 'zR9U6n9fBsWw3zmnbGAl4f90ZcmJk2tenaqf11Yf',
            'Content-Type' => 'application/x-www-form-urlencoded; charset=utf-8',
        ];
        $response = Http::withHeaders($head)->post($ch, $body);

        dd($response->json());


        // if($response == 201){
        //     $apisms = 'https://hlrihub.com/api/v1/confirmCode-sms';
        //     $body = array(
        //         "phone" => $request->phone,
        //         "code" => '1234',
        //     );
        //     $head = [
        //         'Authorization' => 'Bearer ' . 'zR9U6n9fBsWw3zmnbGAl4f90ZcmJk2tenaqf11Yf',
        //         'Content-Type' => 'application/x-www-form-urlencoded; charset=utf-8',
        //     ];
        //     $response = Http::withHeaders($head)->post($apisms, $body);
        // }

        // mail('shahab.a@homeleaderrealty.com', 'test response', json_encode($response->json()));

        // $body = [
        //     'email' =>[ 'mohammadreza@homeleaderrealty.com'],
        //     'message' => $response
        // ];

        // $response = Http::post('https://prod-179.westus.logic.azure.com:443/workflows/c0cd134036404f98b2b0a51b6bf3f020/triggers/manual/paths/invoke?api-version=2016-06-01&sp=%2Ftriggers%2Fmanual%2Frun&sv=1.0&sig=Zwrw8RiTq0XTjvtSU9HtW6vM_UXH4JgOO6B0pI_0tv8', $body);


});

Route::get('/player', function () {
    return view('player');
});

Route::get('/changeUlrIframe/{socket_id}/{url}', function (Request $request) {
    $socket_id = $request->socket_id;
    $url = $request->url;
    return view('changeUlrIframe', compact(['socket_id', 'url']));
})->name('changeUlrIframe');


