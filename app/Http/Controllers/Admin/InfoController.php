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

        if (!$this->validatePhoneNumber($request->phone)) {
            return response()->json([
                'error' => ['Please enter a valid Canadian phone number.']
            ]);
        }

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()->all()
            ]);
        }


        $url =  parse_url($request->url, PHP_URL_HOST);
        $is_token = Site::where('token', $request->token)->first();
        if (!empty($is_token)) {
            // $is_token->url == $url
            if (true) {
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
                $statusCheckPhone = $this->crm($request, $is_token->name);

                if ($statusCheckPhone == 201) {
                    return response()->json([
                        'confirm' => 'SUCCESS',
                        'status' => 'SUCCESS'
                    ]);
                } else if ($statusCheckPhone == 403) {
                    return response()->json([
                        'error' => ['an inquiry has already been submitted with this number']
                    ]);
                } else if ($statusCheckPhone == 429) {
                    return response()->json([
                        'error' => ['Too many tries. Please try again in 5 minutes']
                    ]);
                } else {
                    return response()->json([
                        'error' => ['Invalid verification phone. Please check and try again']
                    ]);
                }
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
        return $response->getStatusCode();
    }

    public function confirmPhone(Request $request)
    {
        $apisms = 'https://hlrihub.com/api/v1/confirmCode-sms';
        $body = array(
            "phone" => $request->phone,
            "code" => $request->code,
        );
        $head = [
            'Authorization' => 'Bearer ' . 'zR9U6n9fBsWw3zmnbGAl4f90ZcmJk2tenaqf11Yf',
            'Content-Type' => 'application/x-www-form-urlencoded; charset=utf-8',
        ];
        $response = Http::withHeaders($head)->post($apisms, $body);

        if ($response->getStatusCode() == 201) {
            return response()->json([
                'status' => 'SUCCESS'
            ]);
        } else {
            return response()->json([
                'error' => ['Invalid verification code. Please check and try again']
            ]);
        }
    }

    public function resendCode(Request $request)
    {
        $apisms = 'https://hlrihub.com/api/v1/reSendConfirmCode-sms';
        $body = array(
            "phone" => $request->phone,
        );
        $head = [
            'Authorization' => 'Bearer ' . 'zR9U6n9fBsWw3zmnbGAl4f90ZcmJk2tenaqf11Yf',
            'Content-Type' => 'application/x-www-form-urlencoded; charset=utf-8',
        ];
        $response = Http::withHeaders($head)->post($apisms, $body);

        if ($response->getStatusCode() == 201) {
            return response()->json([
                'status' => 'SUCCESS'
            ]);
        } else if ($response->getStatusCode() == 403) {
            return response()->json([
                'error' => ['an inquiry has already been submitted with this number']
            ]);
        } else if ($response->getStatusCode() == 429) {
            return response()->json([
                'error' => ['Too many tries. Please try again in 5 minutes']
            ]);
        }
    }

    public function validatePhoneNumber($phoneNumber)
    {
        $canadaPattern = '/^\+?1?\s*\(?(?:(?:[2-9][0-9]{2})\)?[-.\s]?){2}(?:[0-9]{4})$/';
        $cleanedNumber = preg_replace('/\D/', '', $phoneNumber);
        if (preg_match($canadaPattern, $cleanedNumber)) {
            return true;
        } else {
            return false;
        }
    }
    
}
