@extends('layouts.app')
@section('content')
{{--Shows all the posts in a gallery view. Each are in their own album/category.--}}
    <div class="row">
        <div class="col-md-6 col-md-offset-3">

            @foreach($categories as $category)

                    <div class="col-sm-6 col-md-4">
                        <a href="{{ url ('category/'.$category->id) }}">
                        <div class="thumbnail" style="height: 200px">
                            {{--Category/Album image and name pulled in and styled in a thumbnail put into a grid.--}}
                            <img src="{{ asset('images/' .$category->image) }}" style="height:100px; width: 100%; object-fit: cover;"/>
                            <div class="caption">
                                <h3 class="title-style" style="word-wrap: break-word">{{ $category -> name }}</h3>
                            </div>
                        </div>
                        </a>
                    </div>
            @endforeach

            <div class="text-center">
                {!! $categories->links(); !!}
            </div>


        </div>
    </div>

@endsection


