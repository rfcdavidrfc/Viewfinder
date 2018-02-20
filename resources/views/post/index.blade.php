@extends('layouts.app')

@section('title', '| Post ')

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Feed</h1>
        </div>
    </div>

    @foreach($feeds as $feed)
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h2>{{ $feed -> title }}</h2>
            <h5>Published: {{ date('M j, Y', strtotime($feed -> created_at)) }}</h5>

            <p>{{ substr($feed -> body, 0, 250) }} {{ strlen($feed -> body) > 250 ? '...' : '' }}</p>

            <a href=""{{ route('post.single', $feed -> id) }}>Read More</a>

            <hr>
        </div>
    </div>
@endforeach

    <div class="row">
        <div class="col-md-12">
            <div class="text-center">

                {!! $feeds -> links()  !!}

            </div>
        </div>
    </div>

@endsection