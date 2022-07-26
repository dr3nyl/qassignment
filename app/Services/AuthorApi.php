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

        return $authors;

    }

    public function getAuthor($id)
    {
        $data = [];

        $response = Http::withOptions([
            'verify' => false,
            'headers' => [
                'Authorization' => 'Bearer '. session()->get('token')
                ]
            ])->get('https://symfony-skeleton.q-tests.com/api/v2/authors/'. $id);

        $data['details'] = json_decode($response);
        $data['books'] = json_decode($response)->books;

        return $data;

    }

    public function checkAuthorBooks($id)
    {
        $authorData = $this->getAuthor($id);

        return sizeof($authorData['books']) ? 1 : 0 ;
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