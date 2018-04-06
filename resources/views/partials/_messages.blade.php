{{--If something was successful it will print this message.--}}
@if(Session::has('success'))

    <div class="alert alert-success" role="alert">
        <strong>Success:</strong> {{Session::get('success')}}
    </div>
@endif
{{--If not then it will print out this error message with the error it is.--}}
@if(count($errors) > 0)


    <div class="alert alert-danger" role="alert">
        <strong>Errors:</strong>
        <ul>
        @foreach($errors->all() as $error)
            <li> {{ $error }} </li>
        @endforeach
        </ul>
    </div>

@endif