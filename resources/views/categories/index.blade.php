@extends('layouts.app')

@section('title', 'All Albums')

@section('content')

<div class="row">
    <div class="col-md-8">
        <h1>Albums</h1>
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
            </tr>
            </thead>

            <tbody>
            @foreach($categories as $category)
                <tr>
                    <th>{{ $category->id }}</th>
                    <td>{{ $category->name }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="col-md-3">
        <div class="well">

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

