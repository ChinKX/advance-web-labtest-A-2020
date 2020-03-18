<?php

namespace App\Http\Controllers;

use App\Conference;
use App\Paper;
use App\Author;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class PaperController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $papers = Paper::with('author')->get();

		return view('papers.index', [
		    'papers' => $papers,
		]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $paper = new Paper();
        $authors = Author::pluck('name', 'id');
        $conferences = Conference::pluck('name', 'id');

		return view('papers.create', [
            'paper' => $paper,
            'authors' => $authors,
            'conferences' => $conferences
		]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $paper = new Paper();
		$paper->fill($request->all());
		$paper->save();
	
		return redirect()->route('paper.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $paper = Paper::with('author')->find($id);
		if(!$paper) throw new ModelNotFoundException;
	
		return view('papers.show', [
            'paper' => $paper
		]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $paper = Paper::find($id);
		if(!$paper) throw new ModelNotFoundException;
		
		$authors = Author::pluck('name', 'id');
        $conferences = Conference::pluck('name', 'id');

		return view('members.edit', [
            'paper' => $paper,
            'authors' => $authors,
            'conferences' => $conferences
		]);
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
        $paper = Paper::find($id);
		if(!$paper) throw new ModelNotFoundException;

		$paper->fill($request->all());

		$paper->save();

		return redirect()->route('paper.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $paper = Paper::find($id);
        $paper->delete(); 
        return redirect()->route('paper.index')
            ->with('success','Paper deleted successfully');
    }
}
