<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Requests;
use App\Feed;
use Mail;

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

    public function postContact(Request $request) {
       $this -> validate($request, [
           'email'      => 'required|email',
           'subject'    => 'min:5|max:255',
           'message'    => 'min:10']);

       $data = array(
           'email'   => $request -> email,
           'subject' => $request -> subject,
           'bodyMessage' => $request -> message,
           'survey' => ['Q1' => "hello", 'Q2' => 'YES']
       );

        Mail::send('auth/email/contact', $data, function($message) use ($data){

        $message -> from($data['email']);
        $message -> to('davidcusick6@gmail.com');
        $message -> subject($data['subject']);

        });

        return redirect('/feed')->with('success', 'Thank you for contacting us!');
    }

    public function getLogin() {
        return view('auth.login');
    }

    public function getRegister() {
        return view('auth.register');
    }


}
