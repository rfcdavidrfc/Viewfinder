@extends('layouts.app')
@section('content')

@section('title', 'Create Post')

@section('stylesheets')

    {!! Html::style('css/parsley.css') !!}
    <script src="//cloud.tinymce.com/stable/tinymce.min.js?apiKey=og5pkcy6qa2s1s9le5qzhtoer4jyxmf5nwkcthjdeijqd3do"></script>

    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'link code',
            menubar: 'false',
        });
    </script>

@endsection

@section('content')
    <div class = "container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1>Create New Post</h1>
                <hr>

                {!! Form::open(array('route' => 'feeds.store', 'data-parsley-validate' => '')) !!}
                {{Form::label('title', 'Title:')}}
                {{Form::text('title', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255'))}}

                {{ Form::label('slug', 'Slug:') }}
                {{ Form::text('slug', null, array('class' => 'form-control', 'required' => '', 'minlength' => '5', 'maxlength' => '255')) }}

                {{ Form::label('category_id', 'Category:') }}
                <select class="form-control" name="category_id">

                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach

                </select>

                {{Form::label('body', 'Post Body:')}}
                {{Form::textarea('body', null, array('class' => 'form-control', 'required' => ''))}}

                {{Form::submit('Create Post', array ('class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top: 20px;'))}}

                {!! Form::close() !!}
            </div>
        </div>
    </div> {{--End of container--}}

@endsection

@section('scripts')

    {!! Html::script('js/parsley.min.js') !!}

@stop