<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;
use App\Feed;
use Image;

use Session;

class CategoryController extends Controller
{

    public function __construct(){
        $this->middleware('auth', ['except' => ['getSingle']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();

        return view('categories.index')->withCategories($categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this -> validate ($request, array(
            'name' => 'required|max:255',
            'category_image' => 'required|image|max:1999|mimes:jpeg, jpg, png'
        ));

        $category = new Category;

        $category -> name = $request -> name;

        if ($request->hasFile('category_image')){
            $image = $request->file('category_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' .$filename);
            Image::make($image)->save($location);

            $category->image = $filename;
        }

        $category -> save();

        Session::flash('success', 'New category has been created');

        return redirect() -> route('categories.index');
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
        //
    }

    public function getSingle($id)
    {
        $feeds = Feed::where('category_id', $id) -> get();

        return view('categories.single') -> withFeeds($feeds);
    }
}
