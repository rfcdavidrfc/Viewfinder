@extends('layouts.app')

@section('title', "| Edit Tag")
{{--View to allow users to edit tags that have been created.--}}

@section('content')

    {{--Makes use of the tags.update method which allows users to update a tag.--}}
    {{ Form::model($tag, ['route' => ['tags.update', $tag -> id], 'method' => "PUT"]) }}

    {{ Form::label('name', "Title:") }}
    {{ Form::text('name', null, ['class' => 'form-control']) }}
    {{ Form::submit('Save Changes', ['class' => 'btn btn-success', 'style' => 'margin-top:20px;']) }}
    {{ Form::close() }}
@endsection