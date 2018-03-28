@extends('layouts.app')

@section('title', '| Homepage')

@section('content')

 <div class="row">
                <div class="col-md-12">
                    <div>
                        <p class="lead">
                            <a class="btn btn-primary btn-lg pull-right" href="/feeds/create" role="button">Upload a Photo</a>
                        </p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-8">

                    @foreach($feeds as $feed)

                        <div class="post">
                            <h3 class="title-style">{{ $feed -> title }}</h3>
                            @if ($feed->image)
                                <a href="{{ url ('feed/'.$feed->slug) }}"> <img class="image-style form-spacing-top" src="{{ asset('images/' .$feed->image) }}" height="600" width="600"> </a>
                            @endif
                            <p class="form-spacing-top">{{ strip_tags($feed -> body), 0, 100 }} {{ strlen($feed -> body) > 300 ? "..." : "" }}</p>

                        </div>

                        <hr>
                    @endforeach

                </div>

                <div class="col-md-3 col-md-offset-1">
                    <h2>Sidebar</h2>
                </div>
            </div>

    <script>$(document).ready(function() {
            $('image-style').each(function() {
                var maxWidth = 100; // Max width for the image
                var maxHeight = 100;    // Max height for the image
                var ratio = 0;  // Used for aspect ratio
                var width = $(this).width();    // Current image width
                var height = $(this).height();  // Current image height

                // Check if the current width is larger than the max
                if(width > maxWidth){
                    ratio = maxWidth / width;   // get ratio for scaling image
                    $(this).css("width", maxWidth); // Set new width
                    $(this).css("height", height * ratio);  // Scale height based on ratio
                    height = height * ratio;    // Reset height to match scaled image
                    width = width * ratio;    // Reset width to match scaled image
                }

                // Check if current height is larger than max
                if(height > maxHeight){
                    ratio = maxHeight / height; // get ratio for scaling image
                    $(this).css("height", maxHeight);   // Set new height
                    $(this).css("width", width * ratio);    // Scale width based on ratio
                    width = width * ratio;    // Reset width to match scaled image
                    height = height * ratio;    // Reset height to match scaled image
                }
            });
        });
    </script>

@endsection

