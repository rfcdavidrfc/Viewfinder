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

//    Middleware to ensure authentication
    public function __construct() {
        $this->middleware('auth')->only('getMyProfile');
    }


//    Returns all the pages through the routes file.
   public function getIndex(){
       return view( 'pages.welcome');
   }
    public function getFeed() {
        //This limits each page to have a max of 5 posts to ensure there is no issues with loading etc.
        $feeds = Feed::orderBy('created_at', 'desc') -> paginate(5);
        //This pulls in 10 random users on Viewfinder and shows them for other to click and view their posts.
        $users = User::inRandomOrder()->limit(10)->get();
        return view('pages.feed') -> withFeeds($feeds)->withUsers($users);
    }

    public function getGallery() {
//       This limits this page to have a max of 20 categories/albums to choose from.
        $categories = Category::orderBy('name', 'asc')->paginate(20);
        return view('pages.gallery')->withCategories($categories);
    }

    public function getContact() {
        return view('pages.contact');
    }


    public function getMyProfile() {
//       This checks for the specific users posts and posts in on their profile page when they are logged in.
        $user = Auth::user()->id;
//        Limits their posts to 5 per page.
        $feeds = Feed::where('user_id', '=', $user )->orderBy('id', 'desc') -> paginate(5);
        $users = Auth::user();

        return view('pages.myProfile')->withFeeds($feeds)->withUser($users);
    }

    public function getAbout(){
       return view('pages.about');
    }

//    This allows users to contact Viewfinder with any issues they have through there email.
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
//This is the email this is set up to contact. Once the user fills out their email, subject and message this will send their email to this email.
        Mail::send('auth/email/contact', $data, function($message) use ($data){

        $message -> from($data['email']);
        $message -> to('davidcusick6@gmail.com');
        $message -> subject($data['subject']);

        });

        return redirect('/feed')->with('success', 'Thank you for contacting us!');
    }

    public function getUserProfile($id) {
//This limits posts to this page to 10 per page.
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
