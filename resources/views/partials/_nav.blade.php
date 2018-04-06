<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                <li>
                    {{--Viewfinder Brand logo. Used in navbar--}}
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img alt="Viewfinder" src="img/logo_brand.png">
                </a>
                </li>
                {{--Each page to be navigated in the menu bar.--}}
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

                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/about') }}">About</a>
                </li>
            </ul>

            {{--Search bar to search the site for particular post with a specific word --}}
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

                            {{--Dropdown menu with posts only users logged in can access. The user can only see their posts within this to make sure they can only edit or update their own posts.--}}
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