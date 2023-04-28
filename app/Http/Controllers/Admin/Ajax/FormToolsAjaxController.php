<?php

namespace App\Http\Controllers\Admin\Ajax;

use App\Http\Controllers\Controller;
use App\Models\Site;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;

class FormToolsAjaxController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:50',
            'url' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()->all()
            ]);
        }

        $token = $this->unique_code(10);
        $site = new Site();
        $site->name = $request->name;
        $site->url = $request->url;
        $site->token = $token;
        $site->save();

        $url = URL::to('form-tools') . '/' . $token;

        return response()->json([
            "status" => "SUCCESS",
            "url" => $url
        ]);
    }

    public function unique_code($limit)
    {
        return substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, $limit);
    }

    public function dataset()
    {
        $path = public_path('dataset/data.json');
        $json = json_decode(file_get_contents($path), true);
        return $json;
    }
}
