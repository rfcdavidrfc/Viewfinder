<?php

namespace App\Http\Controllers;

use function GuzzleHttp\Psr7\copy_to_string;
use Illuminate\Http\Request;
use App\Feed;
use App\Tag;
use App\Category;
use Session;
use Image;
use Storage;
use Auth;


class FeedController extends Controller
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
//    Retrieves posts that have been made by a user and posts them to the feeds.index for them to view.
    public function index()
    {
        $user = Auth::user()->id;
        $feeds = Feed::where('user_id', '=', $user )->orderBy('id', 'desc') -> paginate(5);

        return view ('feeds.index') -> withFeeds($feeds);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
//    Allows users to create both categories/albums and tags.
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();


        return view('feeds.profile')->withCategories($categories)->withTags($tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
//    This stores the title, category_id, the body and the photo of the posts being made.
    public function store(Request $request)
    {
        //validate the data
        $this-> validate($request, array(
            'title'       => 'required|max:255',
            'category_id' => 'required|integer',
            'body'        => 'required',
            'featured_image' => 'required|image|max:1999|mimes:jpeg, jpg, png'
    ));

        //store in the database
        $feed = new Feed;

        $feed -> title = $request -> title;
        $random_string = md5(microtime());
        $feed -> slug = $random_string;
        $feed -> category_id = $request -> category_id;
        $feed -> user_id = Auth::user()->id;
        $feed -> body = $request -> body;

        if ($request->hasFile('featured_image')){
            $image = $request->file('featured_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' .$filename);
            Image::make($image)->save($location);

            $feed->image = $filename;
        }

        $feed -> save();

        $feed -> tags() -> sync($request -> tags, false);

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
//    This pulls the feeds from the database to show them on the feeds show page.
    public function show($id)
    {
        $feed = Feed::find($id);
        return view('feeds.show')->withFeed($feed);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
//    This allows users to edit their posts.
    public function edit($id)
    {
        $feed = Feed::find($id);
        $categories = Category::all();
        $cats = array();
        foreach($categories as $category){
        $cats [$category->id] = $category->name;
        }

        $tags = Tag::all();
        $tags2 = array();
        foreach($tags as $tag){
        $tags2 [$tag->id] = $tag->name;
        }

        return view('feeds.edit') -> withFeed($feed) -> withCategories($cats) -> withTags($tags2 );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
//    This allows users to update each post.
    public function update(Request $request, $id)
    {
        $feed = Feed::find($id);

        $this-> validate($request, array(
            'title' => 'required|max:255',
            'category_id' => 'required|integer',
            'body' => 'required',
        ));

        $feed = Feed::find($id);
        $feed -> title = $request -> input ('title');
        $feed -> category_id = $request -> input('category_id');
        $feed -> body = $request -> input('body');

        $feed -> save();

        if (isset($request->tags)){
            $feed -> tags() -> sync($request -> tags);
        }else{
            $feed -> tags() -> sync(array());
        }


        Session::flash('success', 'The post was successfully saved!');
        return redirect()->route('feeds.show', $feed->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
//    This allows me to delete a post from the database directly.
    public function destroy($id)
    {
        $feed = Feed::find($id);
        $feed -> tags() -> detach();

        $feed -> delete();

        Session::flash('success', 'The post was successfully deleted!');

        return redirect()->route('feeds.index');
    }
}
