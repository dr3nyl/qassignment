<?php

namespace App\Http\Controllers;

use App\Services\AuthorApi;
use App\Services\BookApi;
use Illuminate\Http\Request;

class AuthorController extends Controller
{

    public function index()
    {
        $authors = (new AuthorApi())->getAuthors();
        $books = (new BookApi())->getBooks();

        return view('dashboard', [
            'authors' => $authors
        ]);

    }

    public function destroy($id)
    {
        // check if author has no books
        if( !(new AuthorApi())->authorHasBooks($id) )
        {
            (new AuthorApi())->delete($id);

            return redirect()->back()->with('success', 'Author deleted!');
        }

            return redirect()->back()->with('error', 'Oops! Cannot delete author with books!');
    }
    
}
