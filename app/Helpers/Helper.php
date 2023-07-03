<?php

use Twilio\Rest\Client;

if (!function_exists('send_sms')) {
    function send_sms($to, $name, $code)
    {
        $sid = env('SMS_SID');
        $token = env('SMS_TOKEN');
        $from = env('SMS_FROM');
        $body = 'Dear ' . $name . ', To confirm your phone number, please use the verification code: ' . $code . ' Thank you. ';

        $client = new Client($sid, $token);
        $message = $client->messages->create(
            $to,
            [
                "from" => $from,
                'body' => $body
            ]
        );
        return $message;
    }
}
