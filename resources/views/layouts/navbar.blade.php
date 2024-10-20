<nav>
    <div class="left-nav">
        <ul>
            <li><a href='{{ route('client.home') }}'
                    class='{{ request()->is('client/home') ? 'active' : '' }}'>home</a></li>
            <li><a href='{{ route('cinemas.cinemaindex') }}'
                    class='{{ request()->is('client/cinemas') ? 'active' : '' }}'>cinemas</a></li>
            <li><a href='{{ route('movies.clientIndex') }}'
                    class='{{ request()->is('client/movies') ? 'active' : '' }}'>movies</a></li>
            <li><a href='{{ route('feedbacks.index') }}'
                    class='{{ request()->is('client/contact') ? 'active' : '' }}'>contact</a></li>
        </ul>
    </div>

    {{-- appears only for the admins --}}
    @role(['admin','super_admin'])
    <form action="{{route('dashboard')}}" method="GET">
        <button
        class="admin_button">
        Dashboard
        </button>
    </form>
    @endrole

    <div class="right-nav">
        <form class="search-bar" method="GET" action="">
            <input type="text" id="search" name="search"
                placeholder="Search movies or cinemas" autocomplete="off">
            <button><i icon="search"></i></button>
        </form>
        <div class="profile">
            <div class='user-info'>

            {{-- another way of the logout --}}
                {{-- @if (Auth::check())
                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
                    @else
                <a href="{{ route('login') }}">Login</a>
                    @endif --}}

            @auth
                    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="logout-link">
                            <i icon='logout'></i> Logout
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="login-link">
                        <i icon='login'></i> Login
                    </a>
                @endauth
            </div>
            <a href='{{route('client.user')}}' class='user-pic'></a>
        </div>
   </div>
</nav>

