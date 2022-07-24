<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class AuthApi
{
    private $username;
    private $password;

    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    public function getToken(){

        $response = Http::withOptions([
            'verify' => false,
            
            'headers'=> [
                'Content-Type' => 'application/json',
                'Accept-Encoding' => 'gzip, deflate, br',
                'Connection' => 'keep-alive'
            ]
            ])
            ->post(env('QSYMFONY_ENDPOINT').'/token', [
    
            'email' => $this->username,
            'password' => $this->password
        ]);

        return json_decode($response);
    }
}