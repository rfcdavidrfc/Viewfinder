<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Feed;
use App\User;

class SearchController extends Controller
{
//    This allows users to search the site to find particular posts.
    public function index(Request $request)
    {
        $query = $request->get('query');
        $users = User::inRandomOrder()->limit(10)->get();

        $feeds = Feed::where('title', 'LIKE', "%$query%")
            ->orWhere('body', 'LIKE', "%$query%")
            ->orderBy('created_at', 'desc') -> paginate(5);
        return view('pages.feed') -> withFeeds($feeds)->withUsers($users);
    }

}
