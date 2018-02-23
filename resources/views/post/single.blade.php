@extends('layouts.app')

@section('title', "| $feed -> title ")

@section('content')


    <div class="row">

        <div class ="col-md-8 col-md-offset-2">

            <h1>{{ $feed -> title }}</h1>
            <p>{{ $feed -> body }}</p>
<hr>
            <p>Posts In: {{ $feed->category->name }}</p>
        </div>
    </div>



@endsection