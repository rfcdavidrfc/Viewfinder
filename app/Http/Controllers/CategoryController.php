<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Feed;
use Image;
use Session;

class CategoryController extends Controller
{
//constructing my middleware. This makes authentication necessary.
    public function __construct(){
        $this->middleware('auth', ['except' => ['getSingle']]);
    }

//Returns all the categories/albums in the category database and returns it to the view catgories.index
    public function index()
    {
        $categories = Category::all();

        return view('categories.index')->withCategories($categories);
    }

//    This stores the name and an image for the the categories/albums
    public function store(Request $request)
    {
        $this -> validate ($request, array(
            'name' => 'required|max:255',
            'category_image' => 'required|image|max:1999|mimes:jpeg, jpg, png'
        ));

//        Saves the image to show in my gallery page.
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

//    This get categories/albums from the database then returns it to categories.single
    public function getSingle($id)
    {
        $feeds = Feed::where('category_id', $id) -> get();

        return view('categories.single') -> withFeeds($feeds);
    }
}
