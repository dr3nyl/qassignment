<?php

namespace App\Http\Controllers;

use App\Services\AuthorApi;
use Illuminate\Http\Request;

class AuthorController extends Controller
{

    public function index()
    {
        $authors = (new AuthorApi())->getAuthors();
        
        return view('dashboard', [
            'authors' => $authors
        ]);
    }
    
}
