@extends('layouts.app')
@section('content')

    <html>
    <head>

        <title>Contact Us</title>

        <style>
            html, body {

        </style>
    </head>
    <body>

    <div class = "container">
        <div class="row">
            <div class="col-md-10">
                <h1>Contact Us</h1>
                <hr>
                <p>jkasnfkanbsfkjasfkjbasljhfbakjbgkj`You'reTheBESTbflkjsdlfjhbsdk;fbljadnfljhbads;fblj;ndfljhbfjbsalkfj
                    ihdfbjlfabljadbf;jbdlfkjbadsljhfbuhofbsajbflhbsdfjlhbdkfjbdlsjhbfk;abdf;lbfjabfljhbskfbsjfbkabf</p>
                <hr>

                <form>
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
                        <textArea id="message" name="message" class="form-control">Type your message here...</textArea>
                        <hr>
                        <a class="btn btn-success btn-lg" href="#" role="button">Add</a>
                    </div>

                </form>
            </div>
        </div>
    </div>

    </body>
    </html>

@endsection