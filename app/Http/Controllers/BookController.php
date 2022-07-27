<?php

namespace App\Http\Controllers;

use App\Services\AuthorApi;
use App\Services\BookApi;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authors = (new AuthorApi())->getAuthors();

        return view('book.create', [
            'authors' => $authors
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        // ddd(["author" => [
        //     "id" => request('author_id')
        // ],
        // "title" => request('title'),
        // "release_date" => request('release_date'),
        // "description" => request('description'),
        // "isbn" => request('isbn'),
        // "format" => request('format'),
        // "number_of_pages" => request('number_of_pages')]);

        if ((new BookApi())->create(request())) {
            return redirect('/dashboard')->with('success', 'Book Created!');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        (new BookApi())->delete($id);

        return redirect()->back()->with('success', 'Book deleted!');
    }
}
