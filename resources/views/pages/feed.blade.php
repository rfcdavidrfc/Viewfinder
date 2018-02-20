@extends('layouts.app')

@section('title', '| Homepage')

@section('content')

 <div class="row">
                <div class="col-md-12">
                    <div class="jumbotron">
                        <h1 class="display-3">Photograph Feed</h1>
                        <hr class="my-4">
                        <p>Add a new photo!</p>
                        <p class="lead">
                            <a class="btn btn-primary btn-lg" href="#" role="button">Add</a>
                        </p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-8">

                    @foreach($feeds as $feed)

                        <div class="post">
                            <h3>{{ $feed -> title }}</h3>
                            <p>{{ strip_tags($feed -> body), 0, 100 }} {{ strlen($feed -> body) > 300 ? "..." : "" }}</p>
                            <a href="{{ url ('feed/'.$feed->slug) }}" class="btn btn-primary">Read More</a>
                        </div>

                        <hr>
                    @endforeach

                </div>

                <div class="col-md-3 col-md-offset-1">
                    <h2>Sidebar</h2>
                </div>
            </div>

@endsection

