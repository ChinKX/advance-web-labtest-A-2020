<?php

namespace App\Http\Controllers;

use App\Paper;
use Illuminate\Http\Request;
use App\Http\Requests\SavePaperRequest;
use App\Http\Resources\PaperCollection;
use App\Http\Resources\PaperResource;

class PaperControllerApi extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return new PaperCollection(Paper::all());
        return new PaperCollection(Paper::with(['author', 'conference'])->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SavePaperRequest $request)
    {
        if ($request->validated()) {
            $paper = Paper::create($request->all());

            return new PaperResource($paper);
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
        return new PaperResource(Paper::with(['author', 'conference'])->findOrFail($id));
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
        $paper = Paper::findOrFail($id);
        $paper->update($request->all());

        return new PaperResource($paper);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $paper = Paper::findOrFail($id);
        $paper->delete();
    
        return 204;
    }
}
