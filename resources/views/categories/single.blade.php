@extends('layouts.app')
@section('content')

    {{--View that shows the individual categories/albums. This displays the photos from that category/album.--}}

    {{--My payment plug in that allows users to buy an image.--}}
    <script src="https://donorbox.org/install-popup-button.js" type="text/javascript" defer></script>

    {{--An if statement that if there ARE NO PHOTOS in the database then it will say there are no photos.--}}
    @if($feeds->count() == 0)
        <h3>There are no photos in this album yet</h3>
    @endIf

    <div class="col-md-12">

        @foreach($feeds as $feed)
            {{--If there is an image then it will will print out the photo as a thumbnail.--}}
                    @if ($feed->image)
                        <div class="col-xs-6 col-md-3">
                        <a data-toggle="modal" data-target="#{!! $feed->id !!}" class="thumbnail">
                        <img class="image-style" src="{{ asset('images/' .$feed->image) }}" height="auto" width="500px">
                        </a>
                        </div>
                    @endif

        {{--This is a modal that when the photo is clicked on it pops up the modal with that photo.--}}
                        <div id="{!! $feed->id !!}" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        {{--pulls in the title --}}
                                        <h4 class="modal-title">{!! $feed->title !!}</h4>
                                    </div>
                                    <div class="modal-body">
                                        {{--This displays that photo is a bigger way.--}}
                                        <img class="image-style" src="{{ asset('images/' .$feed->image) }}" height="auto" width="500px">
                                        <p>Photo ID: {!! $feed->id !!}</p>
                                        <p>{!! $feed->body !!}</p>
                                    </div>
                                    <div class="modal-footer">
                                        {{--Pulls in the donation plug in for users to be able to buy photos.--}}
                                        <p><a href="https://donorbox.org/viewfinder" class="btn btn-primary dbox-donation-button" role="button">Buy</a></p>
                                    </div>
                                </div>

                            </div>
                        </div>

        @endforeach

    </div>



@endsection