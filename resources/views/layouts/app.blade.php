<!DOCTYPE html>
{{--Adds the head, navbar, success and failure messages and javascript to each of the views in my website--}}
<html lang="{{ app()->getLocale() }}">
<head>
@include('partials._head')
</head>
<body>
    <div id="app">

@include('partials._nav')

        <div class="container">

            @include('partials._messages')

        @yield('content')
    </div>

@include('partials._javascript')
    <!-- Scripts -->
        @yield('scripts')
    </div>
</body>
</html>
