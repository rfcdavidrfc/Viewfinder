@extends('layouts.app')

@section('title', "| $tag -> name Tag")

{{--A page that shows each tag individually. This shows what posts have used this tag.--}}
@section('content')

    <div class="row">
        <div class="col-md-8">
            <h1>{{ $tag -> name }} Tag <small>{{ $tag -> feeds() -> count() }} Posts</small></h1>
        </div>
        <div class="col-md-2">
            {{--Button to edit tags.--}}
            <a href="{{ route('tags.edit', $tag -> id) }}" class="btn btn-primary pull-right btn-block" style="margin-top: 20px;">Edit</a>
        </div>
        <div class="col-md-2">
            {{--Button to delete tags.--}}
            {{ Form::open(['route' => ['tags.destroy', $tag -> id], 'method' => 'DELETE']) }}
            {{ Form::submit('Delete', ['class' => 'btn btn-danger btn-block',  'style' => 'margin-top: 20px;']) }}
            {{ Form::close() }}
        </div>
    </div>

    <div class="row">

        <div class="col-md-12">

            {{--Table that stores all the posts the tag is linked with.--}}
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Tags</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>

                @foreach($tag -> feeds as $feed)
                    <tr>
                        <th>{{ $feed -> id }}</th>
                        <td>{{ $feed -> name }}</td>
                        <td>@foreach($feed -> tags as $tag)
                                <span class="label label-default">{{ $tag -> name }}</span>
                        @endforeach
                        </td>
                        {{--User can click to view these posts from here.--}}
                        <td><a href="{{ route('feeds.show', $feed -> id) }}" class="btn btn-default btn-xs">View</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>

    </div>
    @endSection
