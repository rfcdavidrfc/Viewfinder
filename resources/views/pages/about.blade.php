@extends('layouts.app')

@section('title', '| About')

@section('content')
    {{--My about page. Gives user a brief description of the website--}}

    {{--Uses a jumbotron with an images to display this text.--}}
    <div class="jumbotron">
        <h1 class="display-4">About</h1>
        <p class="lead" style="margin-top: 30px;>Viewfinder is a photography based website allowing photographers from all around the world to upload their photos for others to appreciate and purchase them.</p>
        <hr class="my-4">
        <p>This website is focused first and foremost on photographers and their work. This is the main reason we focus are payments on donations to allow the maximum support to be given to the photographers themselves.</p>
        <p class="lead">
           Our payments have a minimum donation of £5. This is for a small print of their chosen photo. This price if this was a site that offered only payments would have this price. Although we wanted there to be a way
           for the photographer to benefit more from his craft. If a buyer believes the piece of art is worth more that the minimum price then they can donate more money to support the photographer.
           Viewfinder will only take a percentage of the total cost up to a donation of £20 which goes towards prints etc. If the price is over £20 then the photographer will get the full amount. We want this to be a community for
           photographers to learn, grow and share their art with the world and give a place for people to buy photographs as prints in a much easier way. In the future we will offer other ways for the photo to be printed. This will
            be on the likes of canvas or different size ranges of prints.

            <hr>
        <p class="text-right" style="margin-top: 40px;">We hope you enjoy viewfinder and make great use of it.

        </p>
    </div>

@endsection


