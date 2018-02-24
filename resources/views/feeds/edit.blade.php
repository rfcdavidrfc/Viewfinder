@extends('layouts.app')

@section('title', '| Edit Posts')

@section('content')

    <div class="row">
        {!! Form::model($feed, ['route' => ['feeds.update', $feed->id], 'method' => 'PUT' ]) !!}
        <div class="col-md-8">
            {{ Form::label('title', 'Title:') }}
            {{ Form::text('title', null, ["class" => 'form-control input-lg' ]) }}

            {{ Form::label('slug', 'Slug:', ["class" => 'form-spacing-top' ]) }}
            {{ Form::text('slug', null, ["class" => 'form-control' ]) }}

            {{ Form::label('category_id', "Category:") }}
            {{ Form::select('category_id', $categories, null, ['class' => 'form-control']) }}

            {{ Form::label('body', 'Body:', ['class' => 'form-spacing-top']) }}
            {{ Form::textArea('body', null, ['class' => 'form-control' ]) }}
        </div>
        <div class="col-md-4">
            <div class="well">

                <dl class="dl-horizontal">
                    <dt>Created At:</dt>
                    <dd>{{date('j M, Y H:i', strtotime($feed->created_at))}}</dd>
                </dl>

                <dl class="dl-horizontal">
                    <dt>Last updated:</dt>
                    <dd>{{date('j M, Y H:i', strtotime($feed->updated_at))}}</dd>
                </dl>

                <hr>

                <div class="row">

                    <div class="col-sm-6">
                        {!! Html::linkRoute('feeds.show', 'Cancel', array($feed->id), array('class' => 'btn btn-danger btn-block')) !!}

                    </div>

                    <div class="col-sm-6">
                        {{ Form::submit('Save Changes', ['class' => 'btn btn-success btn-block']) }}


                    </div>
                </div>
            </div>

        </div>
        {!! Form::close()  !!}
    </div>

@endsection