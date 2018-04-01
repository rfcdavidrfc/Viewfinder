@extends('layouts.app')

@section('title', '| My Profile')

@section('content')

    <script src="https://donorbox.org/install-popup-button.js" type="text/javascript" defer></script>

    <div class="col-md-8 col-md-offset-2">

        @foreach($feeds as $feed)

            <div class="thumbnail">
                @if ($feed->image)
                    <a href="{{ url ('feed/'.$feed->slug) }}"> <img class="image-style form-spacing-top" src="{{ asset('images/' .$feed->image) }}" height="auto" width="500"> </a>
                @endif
                <div class="caption">
                    <h3 class="title-style">{{ $feed -> title }}</h3>
                    <p>Photo ID: {{ $feed->id }}</p>
                    <p class="form-spacing-top">{{ strip_tags($feed -> body), 0, 100 }} {{ strlen($feed -> body) > 300 ? "..." : "" }}</p>
                    <p><a href="https://donorbox.org/viewfinder" class="btn btn-primary dbox-donation-button" role="button">Buy</a></p>
                </div>
            </div>

            <hr>
        @endforeach

        <div class="text-center">
            {!! $feeds->links(); !!}
        </div>

@endsection

