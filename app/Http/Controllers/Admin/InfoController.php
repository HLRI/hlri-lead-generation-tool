<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Info;
use App\Models\Site;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class InfoController extends Controller
{

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'hlri_name' => 'required|max:50',
            'hlri_email' => 'required|email',
            'hlri_phone' => 'required|numeric',
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
                if (!empty($existsInfo)) {
                    if ($existsInfo->email == $request->email or $existsInfo->phone == $request->phone) {
                        return response()->json([
                            'error' => ['Your information has been registered']
                        ]);
                    }
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
                    'error' => ['Your site is not authorized to access']
                ]);
            }
        } else {
            return response()->json([
                'error' => ['The token is not valid']
            ]);
        }
    }

    public function crm(Request $request)
    {
        $ch = 'https://hlrihub.com/api/v1/lead-call';
        $body = array(
            "name" => $request->name,
            "email" => $request->email,
            "phone" => $request->phone,
            "page" => $request->url
        );
        $head = [
            'Authorization' => 'Bearer ' . $request->token,
            'Content-Type' => 'application/x-www-form-urlencoded; charset=utf-8',
        ];
        $response = Http::withHeaders($head)->post($ch, $body);
    }
}
