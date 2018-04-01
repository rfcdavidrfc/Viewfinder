<?php

namespace App\Http\Controllers;
use App\Category;
use Illuminate\Http\Request;

use App\Requests;
use App\Feed;
use Auth;
use App\User;
use Mail;

class PagesController extends Controller {

    public function __construct() {
        $this->middleware('auth')->only('getMyProfile');
    }


   public function getIndex(){
       return view( 'pages.welcome');
   }

    public function getFeed() {
        $feeds = Feed::orderBy('created_at', 'desc') -> paginate(5);
        $users = User::inRandomOrder()->limit(10)->get();
        return view('pages.feed') -> withFeeds($feeds)->withUsers($users);
    }

    public function getGallery() {
        $categories = Category::orderBy('name', 'asc')->paginate(20);
        return view('pages.gallery')->withCategories($categories);
    }

    public function getContact() {
        return view('pages.contact');
    }


    public function getMyProfile() {
        $user = Auth::user()->id;
        $feeds = Feed::where('user_id', '=', $user )->orderBy('id', 'desc') -> paginate(5);
        $users = Auth::user();

        return view('pages.myProfile')->withFeeds($feeds)->withUser($users);
    }

    public function getAbout(){
       return view('pages.about');
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

    public function getUserProfile($id) {

        $feeds = Feed::where('user_id', $id) -> paginate(10);
        return view('pages.userProfile') -> withFeeds($feeds);

    }

    public function getLogin() {
        return view('auth.login');
    }

    public function getRegister() {
        return view('auth.register');
    }


}
