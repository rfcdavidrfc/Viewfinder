<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                Viewfinder
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                <li class="nav-item"><a href="{{ url('/feed') }}">Feed</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/gallery') }}">Galleries</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/myProfile') }}">My Profile</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ url('contact') }}">Contact</a>
                </li>
            </ul>

            <div class="col-md-3" style="padding-top: 0.5%">
            {!! Form::open(['route' => 'search'], array('class' => 'navbar-form navbar-left')) !!}
                <div class="input-group">
                    <input class="form-control" name="query" placeholder="search..." type="text">
                    <span class="input-group-btn">
                        {!! Form::submit('Search',
                                array('class'=>'btn btn-primary')) !!}
                                 </span>
                </div>
            {!! Form::close() !!}
            </div>



            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->

                @guest
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu">
                                <li>

                                    <a href="{{ url('/feeds') }}">My Feeds</a>
                                    <a href="{{ route('categories.index') }}">Albums</a>
                                    <a href="{{ route('tags.index') }}">Tags</a>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                        @endguest
            </ul>
        </div>
    </div>
</nav>