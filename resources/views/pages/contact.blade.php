@extends('layouts.app')

@section('title', '| Contact')

@section('content')
    {{--My contacts page to allow users to contact Viewfinder in anyway. This sends an email to a linked email from the email of the user who is logged in.--}}

    <div class = "container">
        <div class="row">
            <div class="col-md-10">
                <h1>Contact Us</h1>
                <hr>
{{--Forms to intake users details and their message. This is then emailed to the linked email for Viewfinder from their email set up with their account.--}}
                <form action="{{ url('contact') }}" method="POST">
                    {{ csrf_field()  }}
                    <div class="form-group">
                        <label name="email">Email:</label>
                        <input id="email" name="email" class="form-control">
                    </div>

                    <div class="form-group">
                        <label name="subject">Subject:</label>
                        <input id="subject" name="subject" class="form-control">
                    </div>

                    <div class="form-group">
                        <label name="message">Message:</label>
                        <textArea id="message" name="message" class="form-control" placeholder="Type your message here..."></textArea>
                        <hr>
                        <input type="submit" value="Send Message" class="btn btn-success">
                    </div>

                </form>
            </div>
        </div>
    </div>

@endsection