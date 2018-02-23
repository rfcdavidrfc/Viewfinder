@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Reset Password</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        {!! Form::open(['url' => 'password/reset', 'method' => 'POST']) !!}

                        {{ Form::hidden('token', $token) }}

                        {{ Form::label('email', 'Email:') }}
                        {{ Form::email('email', $email, ['class' => 'form-control']) }}

                        {{ Form::label('password', 'New Password:') }}
                        {{ Form::password('password', ['class' => 'form-control']) }}

                        {{ Form::label('password_confirmation', 'Confirm Password:') }}
                        {{ Form::password('password_confirmation', ['class' => 'form-control']) }}

                        <div class="row">
                            <div class="col-md-4 col-md-offset-4">
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