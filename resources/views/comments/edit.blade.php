@extends('layouts.app')

@section('title', '| Edit Comment')

@section('content')
{{--This view is to edit the photo.--}}
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Edit Comment</h1>
            {{--Calls the comments update method which pulls the exact comment from the database to be edited.--}}
            {{ Form::model($comment, ['route' => ['comments.update', $comment->id], 'method' => 'PUT']) }}

            {{--The name and email address is disabled therefore it cannot be edited.--}}
            {{ Form::label('name', 'Name:') }}
            {{ Form::text('name', null, ['class' => 'form-control', 'disabled' => '']) }}

            {{ Form::label('email', 'Email:') }}
            {{ Form::text('email', null, ['class' => 'form-control', 'disabled' => '']) }}

            {{--Comments able to be edited.--}}
            {{ Form::label('comment', 'Comment:') }}
            {{ Form::textarea('comment', null, ['class' => 'form-control']) }}

            {{--The update button updates the comment.--}}
            {{ Form::submit('Update Comment', ['class' => 'btn btn-success', 'style' => 'margin-top: 15px;']) }}

            {{ Form::close() }}
        </div>
    </div>

@endsection