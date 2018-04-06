@extends('layouts.app')

@section('title', 'Tags')

{{--Shows all the tags that are currently created within a table.--}}
@section('content')

    <div class="row">
        <div class="col-md-8">
            {{--Table storing all the tags that have been created.--}}
            <h1>Tags</h1>
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                </tr>
                </thead>

                <tbody>
                @foreach($tags as $tag)
                    <tr>
                        <th>{{ $tag->id }}</th>
                        {{--When you click on the tag link it bring you to a individual page for that tag.--}}
                        <td><a href="{{ route('tags.show', $tag -> id) }}">{{ $tag->name }}</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        {{--A well made to allow users to create new tags that can be used.--}}
        <div class="col-md-3">
            <div class="well">

                {!! Form::open(['route' => 'tags.store', 'method' => 'POST']) !!}

                <h2>New Tag</h2>
                {{ Form::label('name', 'Name:') }}
                {{ Form::text('name', null, ['class' => 'form-control']) }}

                {{ Form::submit('Create New Tag', ['class' => 'btn btn-primary btn-block btn-spacing']) }}

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
