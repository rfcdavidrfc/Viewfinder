<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Feed;
use Session;

class CommentsController extends Controller
{
//you must have authentication to comment.
    public function __construct(){
        $this -> middleware('auth');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
//    This stores the name of the user, their email and the comment itself to the database
    public function store(Request $request, $feed_id)
    {
        $this -> validate($request, array(
            'name'  => 'required|max:255',
            'email' => 'required|email|max:255',
            'comment' => 'required|min:5|max:2000'
        ));

        $feed = Feed::find($feed_id);

        $comment = new Comment();
        $comment -> name = $request -> input('name');
        $comment -> email = $request -> input('email');
        $comment -> comment = $request -> input('comment');
        $comment -> approved = true;
        $comment -> feed() -> associate($feed);

        $comment -> save();

        Session::flash('success', 'Comment was successfully added ');

        return redirect() -> route('post.single', [$feed-> slug]);
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
//    This allows the comment stored to be edited.
    public function edit($id)
    {
        $comment = comment::find($id);
        return view('comments.edit')->withComment($comment);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
//    This allows a comment to also be updated.
    public function update(Request $request, $id)
    {
        $comment = Comment::find($id);

        $this -> validate($request, array('comment' => 'required'));

        $comment -> comment = $request -> comment;
        $comment -> save();

        Session::flash('success', 'Comment updated');

        return redirect()->route('feeds.show', $comment -> feed -> id);
    }

//    This allows users to delete comments off their photos.
    public function delete($id)
    {
        $comment = Comment::find($id);
        return view('comments.delete') -> withComment($comment);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
//    This also allows me as an admin to go and remove this directly from the database. This allows me to control and monitor the comments section.
    public function destroy($id)
    {
        $comment = Comment::find($id);
        $feed_id = $comment -> feed -> id;
        $comment -> delete();

        return redirect() -> route('feeds.show', $feed_id);

    }
}
