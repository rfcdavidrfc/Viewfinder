<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Tag;

Use Session;

class TagController extends Controller
{
//    Add middleware to enable authentication.
    public function __construct(){
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //Returns all the tags in the tag database and returns it to the view tags.index
    public function index()
    {
        $tags = Tag::all();
        return view('tags.index')->withTags($tags);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //    This stores the name for the the tags
    public function store(Request $request)
    {
        $this -> validate($request, array('name' => 'required|max:255'));
        $tag = new Tag;
        $tag -> name = $request -> name;
        $tag -> save();

        Session::flash('success', 'New tag was successfully created!');

        return redirect()->route('tags.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
//    This shows the tags and what they are linked to in the tags show page
    public function show($id)
    {
        $tag = Tag::find($id);
        return view ('tags.show')->withTag($tag);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
//    This allows users to edit tags.
    public function edit($id)
    {
        $tag = Tag::find($id);
        return view ('tags.edit')->withTag($tag);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
//    This allows users to update tags
    public function update(Request $request, $id)
    {
        $tag = Tag::find($id);
        $this -> validate($request, ['name' => 'required|max:255']);
        $tag -> name = $request -> name;
        $tag -> save();

        Session::flash('success', 'Successfully saved your new tag!');

        return redirect()->route('tags.show', $tag -> id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
//    This allows me as an adimin to delete these tags directly from the tags database.
    public function destroy($id)
    {
        $tag = Tag::find($id);
        $tag -> feeds() -> detach();

        $tag -> delete();

        Session::flash('success', 'Tag was deleted successfully!');

        return redirect()->route('tags.index');
    }
}
