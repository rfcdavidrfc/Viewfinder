@extends('layouts.app')
@section('content')

    <script src="https://donorbox.org/install-popup-button.js" type="text/javascript" defer></script>

    @if($feeds->count() == 0)
        <h3>There are no photos in this album yet</h3>
    @endIf

    <div class="col-md-12">

        @foreach($feeds as $feed)
                    @if ($feed->image)
                        <div class="col-xs-6 col-md-3">
                        <a data-toggle="modal" data-target="#{!! $feed->id !!}" class="thumbnail">
                        <img class="image-style" src="{{ asset('images/' .$feed->image) }}" height="auto" width="500px">
                        </a>
                        </div>
                    @endif

                        <div id="{!! $feed->id !!}" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">{!! $feed->title !!}</h4>
                                    </div>
                                    <div class="modal-body">
                                        <img class="image-style" src="{{ asset('images/' .$feed->image) }}" height="auto" width="500px">
                                        <p>Photo ID: {!! $feed->id !!}</p>
                                        <p>{!! $feed->body !!}</p>
                                    </div>
                                    <div class="modal-footer">
                                        <p><a href="https://donorbox.org/viewfinder" class="btn btn-primary dbox-donation-button" role="button">Donate</a></p>
                                    </div>
                                </div>

                            </div>
                        </div>

        @endforeach

    </div>



@endsection