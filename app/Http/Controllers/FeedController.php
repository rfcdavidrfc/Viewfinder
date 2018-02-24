<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Feed;
use App\Category;
use Session;


class FeedController extends Controller
{

    public function _construct()
    {
        $this -> middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feeds = Feed::orderBy('id', 'desc') -> paginate(5);

        return view ('feeds.index') -> withFeeds($feeds);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

//        Changed this Jack
        return view('feeds.profile')->withCategories($categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate the data
        $this-> validate($request, array(
            'title'       => 'required|max:255',
            'slug'        => 'required|alpha_dash|min:5|max:255|unique:feeds,slug',
            'category_id' => 'required|integer',
            'body'        => 'required'
    ));

        //store in the database
        $feed = new Feed;

        $feed -> title = $request -> title;
        $feed -> slug = $request -> slug;
        $feed -> category_id = $request -> category_id;
        $feed -> body = $request -> body;
        $feed -> save();

        Session::flash('success', 'The post was successfully save!');
        //redirect to another page.
        return redirect()->route('feeds.show', $feed->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $feed = Feed::find($id);
        return view('feeds.show') -> withFeed($feed);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $feed = Feed::find($id);
        $categories = Category::all();
        $cats = array();
        foreach($categories as $category){
            $cats [$category->id] = $category->name;
        }
        return view('feeds.edit') -> withFeed($feed) -> withCategories($cats);
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
        $feed = Feed::find($id);
        if($request->input('slug') == $feed -> slug){

            $this-> validate($request, array(
                'title' => 'required|max:255',
                'category_id' => 'required|integer',
                'body' => 'required',
            ));
        }
        $this-> validate($request, array(
            'title' => 'required|max:255',
            'slug' => 'required|alpha_dash|min:5|max:255',
            'category_id' => 'required|integer',
            'body' => 'required',
        ));

        $feed = Feed::find($id);
        $feed -> title = $request -> input ('title');
        $feed -> slug = $request -> input ('slug');
        $feed -> category_id = $request -> input('category_id');
        $feed -> body = $request -> input('body');

        $feed -> save();

        Session::flash('success', 'The post was successfully saved!');
        return redirect()->route('feeds.show', $feed->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $feed = Feed::find($id);

        $feed -> delete();

        Session::flash('success', 'The post was successfully deleted!');

        return redirect()->route('feeds.index');
    }
}
