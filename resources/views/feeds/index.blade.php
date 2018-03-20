@extends('layouts.app')

@section('title', '| All Posts')

@section('content')

    <div class="row">

        <div class = "col-md-10">

            <h1>All Photos</h1>

        </div>
    <div class="col-md-2">
        <a href="{{url('/feeds/profile') }}" class="btn btn-lg btn-block btn-primary btn-h1-spacing">Add new photo</a>
     </div>

        <div class="col-md-12">

            <hr>

        </div>
    </div> <!--End of row!-->

    <div class="row">

        <div class="col-md-12">

            <table class="table">

                <thead>

                <th>#</th>
                <th>Title</th>
                <th>Body</th>
                <th>Created At</th>
                <th></th>

                </thead>


                <tbody>

                @foreach ($feeds as $feed)
                    <tr>
                        <th>{{ $feed->id }}</th>
                        <td>{{ $feed->title }}</td>
                        <td>{{ substr($feed->body, 0, 50) }} {{ strlen($feed->body) > 50 ? "..." : "" }}</td>
                        <td>{{date('j M, Y', strtotime($feed->created_at))}}</td>
                        <td><a href="{{ route('feeds.show', $feed->id) }}" class="btn btn-default btn-sm">View</a>
                            <a href="{{ route('feeds.edit', $feed->id) }}" class="btn btn-default btn-sm">Edit</a></td>

                    </tr>
                @endforeach

                </tbody>

            </table>

            <div class="text-center">
                {!! $feeds -> links(); !!}
            </div>

        </div>

    </div>



@endsection