@extends('layouts.app')
@section('content')

@section('title', 'Create Post')

@section('stylesheets')

    {!! Html::style('css/parsley.css') !!}
    {!! Html::style('css/select2.min.css') !!}

@endsection

@section('content')
    <div class = "container">

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1>Upload your photo</h1>
                <hr>

                {!! Form::open(array('route' => 'feeds.store', 'data-parsley-validate' => '', 'files' => 'true')) !!}
                {{Form::label('title', 'Name:')}}
                {{Form::text('title', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255'))}}

                {{--{{ Form::label('slug', 'Link:') }}--}}
                {{--{{ Form::text('slug', null, array('class' => 'form-control', 'required' => '', 'minlength' => '5', 'maxlength' => '255')) }}--}}

                {{ Form::label('category_id', 'Album:') }}
                <select class="form-control" name="category_id">

                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach

                </select>

                {{ Form::label('tags', 'Tags:') }}
                <select class="form-control select2-multi" name="tags[]" multiple="multiple">
                    @foreach($tags as $tag)
                        <option value='{{ $tag->id }}'>{{ $tag->name }}</option>
                    @endforeach

                </select>

                {{ Form::label('featured_image', 'Upload Image',['class' => 'form-spacing-top']) }}
                {{ Form::file('featured_image') }}

                {{Form::label('body', 'Description:' ,['class' => 'form-spacing-top'])}}
                {{Form::textarea('body', null, array('class' => 'form-control', 'required' => ''))}}

                {{Form::submit('Create Post', array ('class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top: 20px;'))}}

                {!! Form::close() !!}
            </div>
        </div>
    </div> {{--End of container--}}

@endsection

@section('scripts')

    {!! Html::script('js/parsley.min.js') !!}
    {!! Html::script('js/select2.min.js') !!}

    <script type="text/javascript">
        $('.select2-multi').select2();
    </script>

    {{--<script>--}}
        {{--/*Creating an Accordion*/--}}
        {{--$(document).ready(function() {--}}
            {{--$(".container").click(function() {--}}
                {{--this.classList.toggle("active");--}}
                {{--var row = this.nextElementSibling;--}}
                {{--if (row.style.display === "block") {--}}
                    {{--row.style.display = "none";--}}
                {{--} else {--}}
                    {{--row.style.display = "block";--}}
                {{--}--}}
            {{--});--}}
        {{--});--}}
    {{--</script>--}}

@endsection