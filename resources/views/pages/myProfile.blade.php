@extends('layouts.app')

@section('title', '| My Profile')

@section('content')
{{--The logged in users profile. This contains all their posts and their details --}}

        <div class="col-md-2">
            <div class="row">
                {{--Users profile photo pulled from external site.--}}
                <img src="{{ "https://www.gravatar.com/avatar/" . md5(strtolower(trim($user -> email))) . "?s=50&d=mm"  }}" class="author-image">
            </div>
            {{--Users details pulled in from the database--}}
            <div class="row">
                <h5>Name: {!! $user -> name !!}</h5>
            </div>
            <div class="row">
                <h5 style="word-wrap:break-word;">Email: {!! $user -> email !!}</h5>
            </div>
            <a class="btn btn-primary" href="{{ url('/feeds') }}">My Feeds</a>
        </div>

        <div class="col-md-8">
            <div class="row">
            {{--Pulls in all the posts that that logged in user has made.--}}
            @foreach($feeds as $feed)
                <div class="thumbnail">
                    @if ($feed->image)
                        <a href="{{ url ('feed/'.$feed->slug) }}"> <img class="image-style form-spacing-top" src="{{ asset('images/' .$feed->image) }}" height="auto" width="500"> </a>
                    @endif
                    <div class="caption">
                        <h3 class="title-style">{{ $feed -> title }}</h3>
                        <p class="form-spacing-top">{{ strip_tags($feed -> body), 0, 100 }} {{ strlen($feed -> body) > 300 ? "..." : "" }}</p>
                    </div>
                </div>

                <hr>
            @endforeach

            <div class="text-center">
                {!! $feeds->links(); !!}
            </div>


        </div>
        </div>

        <div class="col-md-2">
            <div>
                <p class="lead">
                    {{--Button to allow users to upload a new photo. Links to the create view--}}
                    <a class="btn btn-primary btn-lg pull-right" href="/feeds/create" role="button">Upload a Photo</a>
            </div>
        </div>
    </div>



@endsection

