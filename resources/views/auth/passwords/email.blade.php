 @extends('layouts.app')

 @section('title', 'Reset Password')

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

                         {!! Form::open(['url' => 'password/email', 'method' => 'POST']) !!}

                         {{ Form::label('email', 'Email Address:') }}
                         {{ Form::email('email', null, ['class' => 'form-control']) }}

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


