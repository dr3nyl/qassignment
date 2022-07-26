<?php

namespace App\Services;

use App\Traits\ApiTrait;
use Illuminate\Support\Facades\Http;

class BookApi
{
    use ApiTrait;
    
    public function getBooks(){

        $response = Http::withOptions([
            'verify' => false,
            'headers' => [
                'Authorization' => 'Bearer '. session()->get('token')
            ]
            ])
            ->get($this->endpoint.'books', [
    
            'orderBy' => 'id',
            'direction' => 'ASC',
            'limit' => 50,
            'page' => 1

        ]);

        return json_decode($response)->items;

    }

    public function delete($id)
    {
        $response = Http::withOptions([
            'verify' => false,
            'headers' => [
                'Authorization' => 'Bearer '. session()->get('token')
                ]
            ])->delete($this->endpoint.'books/'. $id);
    }
}