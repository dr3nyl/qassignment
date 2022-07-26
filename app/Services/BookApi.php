<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class BookApi
{
    public function getBooks(){

        $response = Http::withOptions([
            'verify' => false,
            'headers' => [
                'Authorization' => 'Bearer '. session()->get('token')
            ]
            ])
            ->get('https://symfony-skeleton.q-tests.com/api/v2/books', [
    
            'orderBy' => 'id',
            'direction' => 'ASC',
            'limit' => 50,
            'page' => 1

        ]);

        return json_decode($response)->items;

    }
}