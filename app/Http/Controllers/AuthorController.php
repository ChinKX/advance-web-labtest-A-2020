<?php

namespace App\Http\Controllers;

use App\Author;
use Illuminate\Http\Request;
use App\Http\Requests\SaveAuthorRequest;
use App\Http\Resources\AuthorCollection;
use App\Http\Resources\AuthorResource;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return new AuthorCollection(Author::all());
        return new AuthorCollection(Author::with(['conferences', 'papers'])->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveAuthorRequest $request)
    {
        if ($request->validated()) {
            $author = Author::create($request->all());

            $author->conferences()->sync($request->get('conferences'));

            return new AuthorResource($author);
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
        return new AuthorResource(Author::with(['conferences', 'papers'])->findOrFail($id));
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
        $author = Author::findOrFail($id);
        $author->update($request->all());

        $author->conferences()->sync($request->get('conferences'));

        return new AuthorResource($author);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $author = Author::findOrFail($id);
        $author->delete();
    
        return 204;
    }
}
