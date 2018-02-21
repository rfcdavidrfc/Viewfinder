<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Feed;

class PostController extends Controller
{

    public function getIndex()
    {
        $feeds = Feed::paginate(10);

        return view('post.index') -> withFeeds($feeds);
    }

    public function getSingle($slug)
    {
        $feed = Feed::where('slug', '=', $slug) -> first();

        return view('post.single') -> withFeed($feed);
    }
}
