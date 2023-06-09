<?php

namespace App\Http\Controllers\Admin\FormTools;

use App\Http\Controllers\Controller;
use App\Models\Info;
use App\Models\Site;
use Illuminate\Http\Request;

class FormToolsController extends Controller
{
    public function index()
    {
        $sites = Site::orderby('id', 'DESC')->get();
        return view('admin.form-tools.index', compact(['sites']));
    }

    public function create()
    {
        return view('admin.form-tools.create');
    }

    public function show(Request $request)
    {
        $site = Site::where('token', $request->token)->first();
        $infos = Info::where('site_token', $request->token)->orderby('id', 'DESC')->get();
        return view('admin.form-tools.show', compact(['infos', 'site']));
    }

    public function code(Request $request)
    {
        $site = Site::where('token', $request->token)->first();
        return view('admin.form-tools.code', compact(['site']));
    }

    // public function live_data()
    // {

    //     return response()->json([
    //         'test' => 'sdasds'
    //     ]);

    //     return response()->stream(function () {
    //         $infos = Info::where('site_token', '77goprxbpj')->orderby('id', 'DESC')->get();
    //         echo 'data:'.  $infos  . "\n\n";
    //     }, 200, [
    //         'Cache-Control' => 'no-cache',
    //         'Content-Type' => 'text/event-stream',
    //     ]);
    // }


}
