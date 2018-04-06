<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Feed;

class PostController extends Controller
{

    public function getIndex()
    {
//        Limits posts to this to 10 to make sure there are no loading issues.
        $feeds = Feed::paginate(10);

        return view('post.index') -> withFeeds($feeds);
    }

//    This pulls the individual posts using a slug.
    public function getSingle($slug)
    {
        $feed = Feed::where('slug', '=', $slug) -> first();

        return view('post.single') -> withFeed($feed);
    }
}
