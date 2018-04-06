@extends('layouts.app')

@section('title', 'All Albums')

@section('content')

<div class="row">
    <div class="col-md-8">

        <h1>Albums</h1>
        <table class="table">
            {{--Table made that stores the the category/album id and the category/album name.--}}
            <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
            </tr>
            </thead>

            <tbody>
            @foreach($categories as $category)
                <tr>
              {{--This pulls in the categories/albums already made and displays the in the table.--}}
                    <th>{{ $category->id }}</th>
                    <td>{{ $category->name }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="col-md-3">
        {{--A well made for user to enter in categories/albums. I hanged this half way through to albums rather than categories as I thought it fit the website better. --}}
        <div class="well">
            {{--Form to take these details in and submit. This is then stored in the database.--}}
            {!! Form::open(['route' => 'categories.store', 'method' => 'POST', 'files' => 'true']) !!}

            <h2>New Album</h2>
            {{ Form::label('name', 'Name:') }}
            {{ Form::text('name', null, ['class' => 'form-control']) }}

            {{ Form::label('category_image', 'Upload Image',['class' => 'form-spacing-top ']) }}
            {{ Form::file('category_image') }}

            {{ Form::submit('Create New Album', ['class' => 'btn btn-primary btn-block btn-spacing']) }}

            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection

