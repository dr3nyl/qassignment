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

    public function create($request)
    {
        $response = Http::withOptions([
            'verify' => false,
            'headers' => [
                'Authorization' => 'Bearer '. session()->get('token')
            ]
            ])->post($this->endpoint.'books', [
    
                "author" => [
                    "id" => $request['author_id']
                ],
                "title" => $request['title'],
                "release_date" => $request['release_date'],
                "description" => $request['description'],
                "isbn" => $request['isbn'],
                "format" => $request['format'],
                "number_of_pages" => (int)$request['number_of_pages']
        ]);

        return !empty(json_decode($response)->id) ? 1 : 0;
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