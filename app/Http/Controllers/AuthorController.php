<?php

namespace App\Http\Controllers;

use App\Services\AuthorApi;
use App\Services\BookApi;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    private $authorApi;

    function __construct()
    {
        $this->authorApi = new AuthorApi();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authors = $this->authorApi->getAuthors();
        $books = (new BookApi())->getBooks();

        return view('dashboard', [
            'authors' => $authors
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('author.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        if ($this->authorApi->create(request())) {
            return redirect('/dashboard')->with('success', 'Author Created!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $author = $this->authorApi->getAuthor($id);

        return view('author.show', [
            'author' => $author['details'],
            'books' => $author['books']
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // check if author has no books
        if( !$this->authorApi->checkAuthorBooks($id) )
        {
            $this->authorApi->delete($id);

            return redirect()->back()->with('success', 'Author deleted!');
        }
            return redirect()->back()->with('error', 'Oops! Cannot delete author with books!');
    }
    
}
