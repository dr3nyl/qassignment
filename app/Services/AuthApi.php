<?php

namespace App\Services;

use App\Traits\ApiTrait;
use Illuminate\Support\Facades\Http;

class AuthApi
{
    use ApiTrait;
    
    private $username;
    private $password;

    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    public function authenticate(){

        $response = Http::withOptions([
            'verify' => false
            ])
            ->post($this->endpoint.'token', [
    
            'email' => $this->username,
            'password' => $this->password
        ]);

        $this->credentialSession(json_decode($response));
    }

    private function credentialSession($response)
    {
        request()->session()->put('token', $response->token_key);
        request()->session()->put('firstname', $response->user->first_name);
        request()->session()->put('lastname', $response->user->last_name);
        request()->session()->put('email', $response->user->email);
    }
}