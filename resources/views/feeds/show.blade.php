@extends('layouts.app')

@section('title', '| View Post blah')

@section('content')

    <div class="row">
        <div class="col-md-8">
    <h1>{{ $feed->title }}</h1>
    <p class="lead">{{ $feed->body }}</p>
    </div>
        <div class="col-md-4">
            <div class="well">
                <dl class="dl-horizontal">
                    <label>Url:</label>
                    <p><a href="{{ url('feed/'.$feed -> slug) }}">{{ url('feed/'.$feed -> slug) }}</a></p>
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
                        {!! Html::linkRoute('feeds.edit', 'Edit', array($feed->id), array('class' => 'btn btn-primary btn-block')) !!}

                    </div>

                    <div class="col-sm-6">
                        {!! Form::open(['route' => ['feeds.destroy', $feed->id], 'method' => 'DELETE']) !!}

                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}

                        {!! Form::close() !!}

                    </div>

                    <div class="row">
                        <div class="col-md-12">
                        {!! Html::linkRoute('feeds.index', 'Return to all posts', [], ['class' => 'btn btn-default btn-block btn-spacing']) !!}
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

@endsection