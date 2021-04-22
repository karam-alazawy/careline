<?php
/**
 * Created by PhpStorm.
 * User: Hayder Hatem
 * Date: 01/03/21
 * Time: 09:29 ص
 */

namespace App\Helpers;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;

class UnimartNetworkGetter {


    protected $User;
    protected $Url;
    protected $ClientId;
    protected $ClientSecret;
    protected $CallbackUrl;
    protected $ApiUrl;

    function __construct(){
        $this->Url = env('UNIMART_URL');
        $this->ClientId = env('UNIMART_CLIENT_API_ID');
        $this->ClientSecret = env('UNIMART_CLIENT_API_SECRET');
        $this->CallbackUrl = env('UNIMART_CALLBACK_URL');
        $this->ApiUrl = env('UNIMART_API_URL');
    }

    public function getTokenFromEmail($email,$password)
    {
        $payloads = [
            'scope' => '*',
            'grant_type' => 'password',
            'username' => $email,
            'password' => $password,
            'client_id' => $this->ClientId,
            'client_secret' => $this->ClientSecret
        ];
        try {
            $client = new Client([
                                    'verify' => false,
                                    'headers'  => ['Content-Type' => 'application/json']
                                ]);
            $res = $client->post($this->ApiUrl.'login', 
                [
                    'form_params' => $payloads
                ]
            );
            $status =  $res->getStatusCode();
            $response =  $res->getBody();
            $json = json_decode($response, true);
        }catch (\GuzzleHttp\Exception\BadResponseException $e) {
             Log::info('Guzzle Issue  '.$e->getResponse()->getBody()->getContents());
             return false;
        };
        
        return  $json;
    }


    

    public function getToken()
    {
        $payloads = [
            'client_id' => $this->ClientId,
            'client_secret' => $this->ClientSecret
        ];
        try {
            $client = new Client([
                                    'verify' => false,
                                    'headers'  => ['Content-Type' => 'application/json']
                                ]);
            $res = $client->post($this->ApiUrl.'login', 
                [
                    'form_params' => $payloads
                ]
            );
            $status =  $res->getStatusCode();
            $response =  $res->getBody();
            $json = json_decode($response, true);
        }catch (\GuzzleHttp\Exception\BadResponseException $e) {
             Log::info('Guzzle Issue  '.$e->getResponse()->getBody()->getContents());
             return false;
        };
        return  $json;
    }

    public function getClientInfo($email,$token)
    {
        $payloads = [
            'email' => $email,
        ];
        try {
            $client = new Client([
                                    'verify' => false,
                                    'headers'  => [
                                        'Content-Type' => 'application/json',
                                        'Authorization' => 'Bearer '. $token['data']['token']
                                    ]
                                ]);
            $res = $client->post($this->ApiUrl.'user', 
                [
                    'form_params' => $payloads
                ]
            );
            $status =  $res->getStatusCode();
            $response =  $res->getBody();
            $json = json_decode($response, true);
        }catch (\GuzzleHttp\Exception\BadResponseException $e) {
             Log::info('Guzzle Issue  '.$e->getResponse()->getBody()->getContents());
             return false;
        };
        return  $json ;
    }


    public function sendCashBack($email,$cb_amount,$desc,$reference_code,$token)
    {
        $payloads = [
            'email'             => $email,
            'cash_back'         => $cb_amount,
            'description'       => $desc,
            'reference_code'    => $reference_code,
        ];
        try {
            $client = new Client([
                                    'verify' => false,
                                    'headers'  => [
                                        'Content-Type' => 'application/json',
                                        'Authorization' => 'Bearer '. $token['data']['token']
                                    ]
                                ]);
            $res = $client->post($this->ApiUrl.'account/cash_back', 
                [
                    'form_params' => $payloads
                ]
            );
            $status =  $res->getStatusCode();
            $response =  $res->getBody();
            $json = json_decode($response, true);
        }catch (\GuzzleHttp\Exception\BadResponseException $e) {
             Log::info('Guzzle Issue  '.$e->getResponse()->getBody()->getContents());
             return false;
        };
        return  $json ;
    }

    public function getBalance($email,$balance_type,$token)
    {
        $payloads = [
            'email'             => $email,
            'balance_type'      => $balance_type,

        ];
        try {
            $client = new Client([
                                    'verify' => false,
                                    'headers'  => [
                                        'Content-Type' => 'application/json',
                                        'Authorization' => 'Bearer '. $token['data']['token']
                                    ]
                                ]);
            $res = $client->post($this->ApiUrl.'account/balance', 
                [
                    'form_params' => $payloads
                ]
            );
            $status =  $res->getStatusCode();
            $response =  $res->getBody();
            $json = json_decode($response, true);
        }catch (\GuzzleHttp\Exception\BadResponseException $e) {
             Log::info('Guzzle Issue  '.$e->getResponse()->getBody()->getContents());
             return false;
        };
        return  $json ;
    }

    public function requestOtp($email,$client_type,$token)
    {
        $payloads = [
            'email'             => $email,
            'client_type'       => $client_type,

        ];
        try {
            $client = new Client([
                                    'verify' => false,
                                    'headers'  => [
                                        'Content-Type' => 'application/json',
                                        'Authorization' => 'Bearer '. $token['data']['token']
                                    ]
                                ]);
            $res = $client->post($this->ApiUrl.'security/otp', 
                [
                    'form_params' => $payloads
                ]
            );
            $status =  $res->getStatusCode();
            $response =  $res->getBody();
            $json = json_decode($response, true);
        }catch (\GuzzleHttp\Exception\BadResponseException $e) {
             Log::info('Guzzle Issue  '.$e->getResponse()->getBody()->getContents());
             return false;
        };
        return  $json ;
    }


    public function createJournalTrans($email,$action_type,$amount,$otp_code,$description,$reference_code,$token)
    {
        $payloads = [
            'email'             => $email,
            'action_type'       => $action_type,
            'amount'            => $amount,
            'otp_code'          => $otp_code,
            'description'       => $description,
            'reference_code'    => $reference_code,

        ];
        try {
            $client = new Client([
                                    'verify' => false,
                                    'headers'  => [
                                        'Content-Type' => 'application/json',
                                        'Authorization' => 'Bearer '. $token['data']['token']
                                    ]
                                ]);
            $res = $client->post($this->ApiUrl.'account/transaction', 
                [
                    'form_params' => $payloads
                ]
            );
            $status =  $res->getStatusCode();
            $response =  $res->getBody();
            $json = json_decode($response, true);
        }catch (\GuzzleHttp\Exception\BadResponseException $e) {
             Log::info('Guzzle Issue  '.$e->getResponse()->getBody()->getContents());
             return false;
        };
        return  $json ;
    }


    public function getClientProfit($email,$token)
    {
        $payloads = [
            'email' => $email,
        ];
        try {
            $client = new Client([
                                    'verify' => false,
                                    'headers'  => [
                                        'Content-Type' => 'application/json',
                                        'Authorization' => 'Bearer '. $token['data']['token']
                                    ]
                                ]);
            $res = $client->post($this->ApiUrl.'profit', 
                [
                    'form_params' => $payloads
                ]
            );
            $status =  $res->getStatusCode();
            $response =  $res->getBody();
            $json = json_decode($response, true);
        }catch (\GuzzleHttp\Exception\BadResponseException $e) {
             Log::info('Guzzle Issue  '.$e->getResponse()->getBody()->getContents());
             return false;
        };
        return  $json ;
    }

}