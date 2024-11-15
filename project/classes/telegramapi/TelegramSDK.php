<?php

namespace Project\Classes\TelegramApi;

class TelegramSDK
{
    private $token;

    public function __construct($token)
    {
        $this->token = $token;
    }
    public function sendMessage($method, $param=[])
    {
        $request = $this->sendRequest($method, $param);
        return $request;
    }
    private function sendRequest($method, $param=[]) 
    {
        $url = "https://api.telegram.org/bot$this->token/$method?";
        $url .= http_build_query($param);
        $ch = curl_init();
        $optArray = array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true
        );
        curl_setopt_array($ch, $optArray);
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }
}