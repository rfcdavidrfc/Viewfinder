@extends('layouts.app')

@section('title', '| Homepage')

@section('content')
    {{--Main feed. Showing all posts.--}}
    {{--My script: Donations/Buying system--}}
    <script src="https://donorbox.org/install-popup-button.js" type="text/javascript" defer></script>

 <div class="row">
                <div class="col-md-9">

                    @foreach($feeds as $feed)
{{--posts photo with details if there is one to post. Styled as a thumbnail--}}
                        <div class="thumbnail">
                            @if ($feed->image)
                                <a href="{{ url ('feed/'.$feed->slug) }}"> <img class="image-style form-spacing-top" src="{{ asset('images/' .$feed->image) }}" height="auto" width="700"> </a>
                            @endif
                            {{--<h1>User: {{ $feed -> name }}</h1>--}}
                            <div class="caption">
                                <h3 class="title-style">{{ $feed -> title }}</h3>
                                {{--Photo ID is the photos unique ID to allow the admin team to know what photo is being purchased to be made into a print.--}}
                                <p>Photo ID: {{ $feed -> id }}</p>
                                {{--Shows the photos tags--}}
                                <p class="form-spacing-top">{{ strip_tags($feed -> body), 0, 100 }} {{ strlen($feed -> body) > 300 ? "..." : "" }}</p>
                                {{--When you click this button it brings you to the buy/donate page--}}
                                <p><a href="https://donorbox.org/viewfinder" class="btn btn-primary dbox-donation-button" role="button">Buy</a>
                                    {{--When you click this it brings the user to the comment page.--}}
                                    <a href = "{{ url ('feed/'.$feed->slug) }}" class = "btn btn-primary" role = "button">Comment</a>
                                </p>

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
                    {{--When clicked it brings user to an upload page to allow them to post their photo.--}}
                 <a class="btn btn-primary btn-lg pull-right" href="/feeds/create" role="button">Upload a Photo</a>
             <h2 style="padding-top: 50%">Users</h2>
             @foreach($users as $user)
                 {{--Pulls in a max of 10 random users that is current signed up with Viewfinder and displays their profile photo and a link to see what posts they have individually made.--}}
                 <a href="{{ url ('user/'.$user->id) }}">
                 <div class="row" style="padding: 10px">
                     <div class="author-info">
                         {{--Pulls in external profile photo from outward source--}}
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

