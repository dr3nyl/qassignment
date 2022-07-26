<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class AuthorApi
{
    public function getAuthors(){

        $response = Http::withOptions([
            'verify' => false,
            'headers' => [
                'Authorization' => 'Bearer '. session()->get('token')
            ]
            ])->get('https://symfony-skeleton.q-tests.com/api/v2/authors', [
    
                'orderBy' => 'id',
                'direction' => 'ASC',
                'limit' => 50,
                'page' => 1

        ]);
        $authors = json_decode($response)->items;
       // ddd($this->getSingleAuthor($authors));
        return $authors;

    }

    public function authorHasBooks($id)
    {
       
        $response = Http::withOptions([
            'verify' => false,
            'headers' => [
                'Authorization' => 'Bearer '. session()->get('token')
                ]
            ])->get('https://symfony-skeleton.q-tests.com/api/v2/authors/'. $id);

        
        return sizeof(json_decode($response)->books) ? 1 : 0;

    }

    public function delete($id)
    {
        $response = Http::withOptions([
            'verify' => false,
            'headers' => [
                'Authorization' => 'Bearer '. session()->get('token')
                ]
            ])->delete('https://symfony-skeleton.q-tests.com/api/v2/authors/'. $id);
    }
}