@extends('layouts.app')

@section('title', '| Edit Posts')

@section('stylesheets')

    {{--View to edit your feeds--}}
    {!! Html::style('css/select2.min.css') !!}

@endsection

@section('content')

    <div class="row">
        {{--This form allows users to update their posts--}}
        {!! Form::model($feed, ['route' => ['feeds.update', $feed->id], 'method' => 'PUT' ]) !!}
        <div class="col-md-8">
            {{ Form::label('title', 'Name:') }}
            {{ Form::text('title', null, ["class" => 'form-control input-lg' ]) }}

            {{ Form::label('category_id', "Album:") }}
            {{ Form::select('category_id', $categories, null, ['class' => 'form-control']) }}

            {{ Form::label('tags', 'Tags:', ['class' => 'form-spacing-top']) }}
            {{ Form::select('tags[]', $tags, null, ['class' => 'form-control select2-multi', 'multiple' => 'multiple']) }}

            {{ Form::label('featured_image', 'Updated Featured Image:', ['class' => 'form-spacing-top']) }}
            {{ Form::file('featured_image') }}

            {{ Form::label('body', 'Description:', ['class' => 'form-spacing-top']) }}
            {{ Form::textArea('body', null, ['class' => 'form-control' ]) }}
        </div>
        <div class="col-md-4">

            <div class="well">

                <dl class="dl-horizontal">
                    {{--Pulls in the time created and the time it was updated from the database--}}
                    <dt>Created At:</dt>
                    <dd>{{date('j M, Y H:i', strtotime($feed->created_at))}}</dd>
                </dl>

                <dl class="dl-horizontal">
                    <dt>Last updated:</dt>
                    <dd>{{date('j M, Y H:i', strtotime($feed->updated_at))}}</dd>
                </dl>

                <hr>

                <div class="row">
                    {{--This well contains buttons to allow users to save the updated feed or cancel the changes made.--}}
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

{{--My Scripts--}}
@section('scripts')

    {!! Html::script('js/select2.min.js') !!}

    <script type="text/javascript">

        $('.select2-multi').select2();
        $('.select2-multi').select2().val({!! json_encode($feed -> tags() -> allRelatedIds()) !!}).trigger('change');


    </script>

@endsection