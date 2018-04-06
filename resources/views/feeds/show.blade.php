@extends('layouts.app')

@section('title', '| View Post ')

@section('content')
{{--Single post accessed from the admin section.--}}
    <div class="row">
        <div class="col-md-8">
            {{--Displays the photo links to the post.--}}
            <img src="{{ asset('images/'.$feed -> image) }}" display="block" height="100%" width="100%"/>
{{--Displays the post title--}}
    <h1>{{ $feed->title }}</h1>
    <p class="lead">{{ $feed->body }}</p>
            <hr>
            {{--Displays the post tags--}}
            <div class="tags">
            @foreach($feed -> tags as $tag)
                <span class="label label-default">{{ $tag -> name }}</span>
            @endforeach
            </div>
{{--Shows all linked comments to the post.--}}
            <div id="backend-comments" style="margin-top: 50px;">
                {{--Comment counter--}}
                <h3>Comments <small>{{ $feed->comments()->count() }} Total</small></h3>
                {{--Table to store the comments--}}
                <table class="table">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Comment</th>
                        <th width="70px"></th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach ($feed -> comments as $comment)
                    <tr>
                        <td>{{ $comment -> name }}</td>
                        <td>{{ $comment -> email }}</td>
                        <td>{{ $comment -> comment }}</td>
                        <td>
                          {{--Can edit and delete the comments from this section.--}}
                            <a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-pencil"></span></a>
                            <a href="{{ route('comments.delete', $comment->id) }}" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span></a>

                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
    </div>
        <div class="col-md-4">
            {{--Pulls in all the information from the database for the specific photo.--}}
            <div class="well">
                <dl class="dl-horizontal">
                    <label>Url:</label>
                    <p style="word-wrap:break-word;"><a href="{{ url('feed/'.$feed -> slug) }}">{{ url('feed/'.$feed -> slug) }}</a></p>
                </dl>

                <dl class="dl-horizontal">
                    <label>Category:</label>
                    <p>{{ $feed -> category -> name }}</p>
                </dl>

                <dl class="dl-horizontal">
                    <label>Created At:</label>
                    <p>{{date('j M, Y H:i', strtotime($feed->created_at))}}</p>
                </dl>

                <dl class="dl-horizontal">
                    <label>Last updated:</label>
                    <p>{{date('j M, Y H:i', strtotime($feed->updated_at))}}</p>
                </dl>

                <hr>

                <div class="row">

                    <div class="col-sm-6">
                        {{--Allows users to edit the post.--}}
                        {!! Html::linkRoute('feeds.edit', 'Edit', array($feed->id), array('class' => 'btn btn-primary btn-block')) !!}

                    </div>

                    <div class="col-sm-6">
                        {{--Allows users to delete the post--}}
                        {!! Form::open(['route' => ['feeds.destroy', $feed->id], 'method' => 'DELETE']) !!}

                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}

                        {!! Form::close() !!}

                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            {{--Allows users to return to the rest of the posts they have made.--}}
                        {!! Html::linkRoute('feeds.index', 'Return to all posts', [], ['class' => 'btn btn-default btn-block btn-spacing']) !!}
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

@endsection