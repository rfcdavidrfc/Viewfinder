@extends('layouts.app')

@section('title', '| Delete Comment')

@section('content')
    {{--View is to allow users to be able to delete comments.--}}

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>ARE YOU SURE YOU WANT TO DELETE?</h1>
            <p>
                {{--Prints out to the user what the comment is, name, email and the comment itself.--}}
                <strong>Name:</strong> {{ $comment -> name }} <br>
                <strong>Email:</strong> {{ $comment -> email }} <br>
                <strong>Comment:</strong> {{ $comment -> comment }}
            </p>

            {{--This brings the user to destroy the comment. The button then confirms the delete.--}}
            {{ Form::open(['route' => ['comments.destroy', $comment -> id], 'method' => 'DELETE']) }}

            {{ Form::submit('YES DELETE THIS COMMENT', ['class' => 'btn btn-lg btn-block btn-danger']) }}

            {{ Form::close() }}
        </div>
    </div>

@endsection

