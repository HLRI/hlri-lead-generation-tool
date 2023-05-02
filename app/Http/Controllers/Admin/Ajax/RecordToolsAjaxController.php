<?php

namespace App\Http\Controllers\Admin\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RecordToolsAjaxController extends Controller
{
    public function dataset(Request $request)
    {
        $socket_id = $request->socket_id;
        $path = public_path('dataset/' . $socket_id . '.json');
        $json = json_decode(file_get_contents($path), true);
        return $json;
    }
}
