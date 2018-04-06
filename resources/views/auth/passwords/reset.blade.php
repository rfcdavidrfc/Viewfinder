@extends('layouts.app')

{{--Built in Laravel class for reseting password--}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Reset Password</div>

                    <div class="panel-body">
                        {{--An if statement to alert the user that there session is successful.--}}
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
{{--Once the user clicks on the reset password button this uses a form to bring the user to the password rest page.--}}
                        {!! Form::open(['url' => 'password/reset', 'method' => 'POST']) !!}
{{--Form takes in tokens which is stored in the database. This remembers the user.--}}
                        {{ Form::hidden('token', $token) }}
{{--Form to take in the users email.--}}
                        {{ Form::label('email', 'Email:') }}
                        {{ Form::email('email', $email, ['class' => 'form-control']) }}
                        {{--Form to take in the users password.--}}
                        {{ Form::label('password', 'New Password:') }}
                        {{ Form::password('password', ['class' => 'form-control']) }}
                        {{--Form to take in the users confirmation for the password.--}}
                        {{ Form::label('password_confirmation', 'Confirm Password:') }}
                        {{ Form::password('password_confirmation', ['class' => 'form-control']) }}

                        <div class="row">
                            <div class="col-md-4 col-md-offset-4">
                                {{--Button to submit this password reset.--}}
                                {{ Form::submit('Reset Password', ['class' => 'btn btn-primary btn-block form-spacing-top']) }}
                            </div>
                        </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection