<?php

namespace App\Http\Controllers;

use App\Conference;
use Illuminate\Http\Request;
use App\Http\Requests\SaveConferenceRequest;
use App\Http\Resources\ConferenceCollection;
use App\Http\Resources\ConferenceResource;

class ConferenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return new ConferenceCollection(Conference::all());
        return new ConferenceCollection(Conference::with(['authors', 'papers'])->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveConferenceRequest $request)
    {
        if ($request->validated()) {
            $conference = Conference::create($request->all());

            $conference->authors()->sync($request->get('authors'));

            return new ConferenceResource($conference);
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
        return new ConferenceResource(Conference::with(['authors', 'papers'])->findOrFail($id));
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
        $conference = Conference::findOrFail($id);
        $conference->update($request->all());

        $conference->authors()->sync($request->get('authors'));

        return new ConferenceResource($conference);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $conference = Conference::findOrFail($id);
        $conference->delete();
    
        return 204;
    }
}
