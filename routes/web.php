<?php

use App\Models\Info;
use App\Models\Site;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// header('Access-Control-Allow-Origin: *');
// header('Access-Control-Allow-Headers: Authorization, Content-Type');

header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Authorization, Content-Type, X-CSRF-TOKEN');
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {

    // return response()->json([

    // ]);
    // $infos = Info::where('site_token', 'fsdfjkn874ybeurjvba')->get();
    // dd($infos);
    return view('tools.form');
});

Route::post('/api', function (Request $request) {
    return $request->all();
})->name('my-api');





Auth::routes();

Route::get('/panel', [App\Http\Controllers\HomeController::class, 'index'])->name('panel');
