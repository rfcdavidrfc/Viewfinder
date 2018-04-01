@extends('layouts.app')
<?php $titleTag = htmlspecialchars($feed -> title); ?>
@section('title', "| $titleTag")

@section('content')


    <div class="row">

        <div class ="col-md-8 col-md-offset-2">

            <h1 class="text-center">{{ $feed -> title }}</h1>

            <div class="row">
            <div class="col-md-8 col-md-offset-2">
            @if ($feed->image)
                    <a href="{{ url ('feed/'.$feed->slug) }}"> <img class="image-style form-spacing-top" src="{{ asset('images/' .$feed->image) }}" height="auto" width="500"> </a>
            @endif
            </div>
            </div>

            <h5 style="font-weight: 200">{{date('M j, Y',strtotime($feed->created_at))}}</h5>
            <p>{{ $feed -> body }}</p>
            <hr>
            <p>Albums: {{ $feed->category->name }}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h3 class="comments-title"><span class="glyphicon glyphicon-comment"></span> {{ $feed -> comments() -> count() }}
                Comments</h3>
            @foreach($feed -> comments as $comment)
                <div class="comment">
                    <div class="author-info">
                    <img src="{{ "https://www.gravatar.com/avatar/" . md5(strtolower(trim($comment -> email))) . "?s=50&d=mm"  }}" class="author-image">
                        <div class="author-name">
                           <h4> {{ $comment -> name }} </h4>
                           <p class="author-time"> {{ date('nS F, Y - g:iA', strtotime ($comment -> created_at)) }} </p>
                        </div>

                    </div>
                    <div class="comment-content">
                    <p>{{ $comment -> comment }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="row">

        <div id="comment-form" class="col-md-8 col-md-offset-2">
            {{ Form::open(['route' => ['comments.store', $feed -> id], 'method' => 'FEED']) }}

                <div class="row">
                    <div class="col-md-6">
                        {{ Form::label('name', "Name:") }}
                        {{ Form::text('name', null, ['class' => 'form-control']) }}
                    </div>

                    <div class="col-md-6">
                        {{ Form::label('email', "Email:") }}
                        @guest
                            {{ Form::text('email', null, ['class' => 'form-control']) }}
                        @else
                            {{ Form::text('email', Auth::user()->email, ['class' => 'form-control']) }}
                        @endguest
                    </div>

                    <div class="col-md-12">
                        {{ Form::label('comment', "Comment:") }}
                        {{ Form::textarea('comment', null, ['class' => 'form-control']) }}

                        {{ Form::submit('Add Comment', ['class' => 'btn btn-success btn-block']) }}
                    </div>
                </div>

            {{ Form::close() }}
        </div>

    </div>





@endsection