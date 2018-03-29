@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-md-6 col-md-offset-3">

            @foreach($categories as $category)

                    <div class="col-sm-6 col-md-4">
                        <a href="{{ url ('category/'.$category->id) }}">
                        <div class="thumbnail">
                            <div class="caption">
                                <h3 class="title-style">{{ $category -> name }}</h3>
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