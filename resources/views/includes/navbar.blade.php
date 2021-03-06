
<nav class="navbar navbar-light navbar-expand-lg fixed-top" id="mainNav">
    <div class="container"><a class="navbar-brand" href="/home">Blog</a><button data-toggle="collapse" data-target="#navbarResponsive" class="navbar-toggler" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i></button>
        <div
            class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="nav navbar-nav ml-auto">
                <li class="nav-item" role="presentation"><a class="nav-link" href="/home">Home</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" href="/create">New Blog</a></li>
                @if (Auth::guest())
                    <li class="nav-item" role="presentation"><a class="nav-link" href="/login">Login</a></li>
                @else
                     <li class="nav-item" role="presentation"><a class="nav-link" href="/user/{{Auth::id()}}">{{explode(' ', trim(Auth::user()->name))[0]}}</a></li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                           Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    
                </li>
                @endif
                
            
    </div>
    </div>
</nav>