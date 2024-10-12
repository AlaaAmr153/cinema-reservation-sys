<nav>
    <div class="left-nav">
        <ul>
            <li><a href='{{ route('client.home') }}'
                    class='{{ request()->is('client/home') ? 'active' : '' }}'>home</a></li>
            <li><a href='{{ route('client.cinemas') }}'
                    class='{{ request()->is('client/cinemas') ? 'active' : '' }}'>cinemas</a></li>
            <li><a href='{{ route('movies.clientIndex') }}'
                    class='{{ request()->is('client/movies') ? 'active' : '' }}'>movies</a></li>
            <li><a href='{{ route('feedbacks.index') }}'
                    class='{{ request()->is('client/contact') ? 'active' : '' }}'>contact</a></li>
        </ul>
    </div>
    <div class="right-nav">
        <form class="search-bar">
            <input type="text" id="search" name="q" value=""
                placeholder="Search movies or cinemas..." autocomplete="off">
            <button><i icon="search"></i></button>
        </form>
        <div class="profile">
            <div class='user-info'>
                <button onclick='login()'>
                    <i icon='login'></i>Login
                </button>
            </div>
            <a href='#' class='user-pic'></a>
        </div>
   </div>
</nav>

