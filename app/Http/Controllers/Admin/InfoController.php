<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Info;
use App\Models\Site;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InfoController extends Controller
{

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:50',
            'email' => 'required|email',
            'phone' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()->all()
            ]);
        }


        $url =  parse_url($request->url, PHP_URL_HOST);
        $is_token = Site::where('token', $request->token)->first();
        if (!empty($is_token)) {
            if ($is_token->url == $url) {
                $existsInfo = Info::where('site_token', $request->token)->first();
                if ($existsInfo->email == $request->email or $existsInfo->phone == $request->phone) {
                    return response()->json([
                        'status' => 'EXISTSINFO'
                    ]);
                }
                $info = new Info();
                $info->name = $request->name;
                $info->email = $request->email;
                $info->phone = $request->phone;
                $info->site_token = $request->token;
                $info->save();
                return response()->json([
                    'status' => 'SUCCESS'
                ]);
            } else {
                return response()->json([
                    'status' => 'URLNOK'
                ]);
            }
        } else {
            return response()->json([
                'status' => 'TOKENNOK'
            ]);
        }
    }
}
