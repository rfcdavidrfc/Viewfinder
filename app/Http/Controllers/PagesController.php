<?php

namespace App\Http\Controllers;

use App\Feed;

class PagesController extends Controller {


   public function getIndex(){
       return view( 'pages.welcome');
   }

    public function getFeed() {
        $feeds = Feed::orderBy('created_at', 'desc') -> limit(4) -> get();
        return view('pages.feed') -> withFeeds($feeds);
    }

    public function getExplore() {
        return view('pages.explore');
    }

    public function getContact() {
        return view('pages.contact');
    }

    public function getProfile() {
        return view('feeds.profile');
    }

    public function getLogin() {
        return view('auth.login');
    }

    public function getRegister() {
        return view('auth.register');
    }


}
