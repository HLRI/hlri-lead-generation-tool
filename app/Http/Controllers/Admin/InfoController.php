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
            'name' => 'required|max:50',
            'email' => 'required|email',
            'phone' => 'required',
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
                $this->crm($request, $is_token->name);
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

    public function crm($request, $prn)
    {
        $ch = 'https://hlrihub.com/api/v1/lead-call';
        $body = array(
            "name" => $request->name,
            "email" => $request->email,
            "phone" => $request->phone,
            "page" => $request->url,
            "source" => $request->source,
            "medium" => $request->medium,
            "term" => $request->term,
            "content" => $request->content,
            "campaign" => $request->campaign,
            "custom_source" => $request->custom_source,
            "prName" => $prn,
        );
        $head = [
            'Authorization' => 'Bearer ' . 'zR9U6n9fBsWw3zmnbGAl4f90ZcmJk2tenaqf11Yf',
            'Content-Type' => 'application/x-www-form-urlencoded; charset=utf-8',
        ];
        $response = Http::withHeaders($head)->post($ch, $body);


        mail('shahab.a@homeleaderrealty.com', 'test response', json_encode($response->json()));

    }
}
