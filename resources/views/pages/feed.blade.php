@extends('layouts.app')

@section('title', '| Homepage')

@section('content')
    <script src="https://donorbox.org/install-popup-button.js" type="text/javascript" defer></script>

 <div class="row">
                <div class="col-md-6 col-md-offset-3">

                    @foreach($feeds as $feed)

                        <div class="thumbnail">
                            @if ($feed->image)
                                <a href="{{ url ('feed/'.$feed->slug) }}"> <img class="image-style form-spacing-top" src="{{ asset('images/' .$feed->image) }}" height="auto" width="500"> </a>
                            @endif
                            <div class="caption">
                                <h3 class="title-style">{{ $feed -> title }}</h3>
                                <p>Photo ID: {{ $feed -> id }}</p>
                                <p class="form-spacing-top">{{ strip_tags($feed -> body), 0, 100 }} {{ strlen($feed -> body) > 300 ? "..." : "" }}</p>
                                <p><a href="https://donorbox.org/viewfinder" class="btn btn-primary dbox-donation-button" role="button">Donate</a></p>
                            </div>
                        </div>

                        <hr>
                    @endforeach

                    <div class="text-center">
                        {!! $feeds->links(); !!}
                    </div>


                </div>

     <div class="col-md-2">
         <div>
             <p class="lead">
                 <a class="btn btn-primary btn-lg pull-right" href="/feeds/create" role="button">Upload a Photo</a>
             <h2 style="padding-top: 50%">Users</h2>
             @foreach($users as $user)
                 <a href="{{ url ('user/'.$user->id) }}">
                 <div class="row" style="padding: 10px">
                     <div class="author-info">
                         <img src="{{ "https://www.gravatar.com/avatar/" . md5(strtolower(trim($user -> email))) . "?s=50&d=mm"  }}" class="author-image">
                         <div class="author-name">
                             <h4> {{ $user -> name }} </h4>
                         </div>

                     </div>
                 </div>
                 </a>
                 @endforeach
         </div>
     </div>
 </div>


@endsection

