    <header class="main_menu">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand" href="{{route('home')}}"> <img src="/img/logo.png" alt="logo"> </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse main-menu-item justify-content-center"
                            id="navbarSupportedContent">
                            <ul class="navbar-nav">
                                <li class="nav-item active">
                                    <a class="nav-link" href="{{route('home')}}">Home</a>
                                </li>
                                @guest
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('login')}}">Login</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('register')}}"> Register</a>
                                    </li>
                                @endguest
                                @auth
                                    @if (auth()->user()->role_id == 2)
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{route('post.create')}}"> Add post</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{route('posts.show')}}"> My Post's</a>
                                        </li>
                                    @else
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{route('all-posts')}}"> View Posts</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{route('category.create')}}"> Add New Category</a>
                                        </li>
                                    @endif
                                    <form id="logout_form" action="{{route('logout')}}" method="POST">
                                        @csrf
                                        <li class="nav-item">
                                            <a class="nav-link" onclick="logout()" href="#">Logout</a>
                                        </li>
                                    </form>
                                @endauth
                                {{-- <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Pages
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="single-blog.html">Single blog</a>
                                        <a class="dropdown-item" href="elements.html">elements</a>
                                    </div>
                                </li> --}}
                            </ul>
                        </div>
                        <div class="header_social_icon d-none d-sm-block">
                            <ul>
                                <li>
                                    <div id="wrap">
                                        <form action="#">
                                            <input id="search" name="search" type="text" placeholder="Search here"><span
                                                class="ti-search"></span>
                                        </form>
                                    </div>
                                </li>
                                @auth
                                    <li>Welcome <a href="{{route('profile')}}">{{auth()->user()->name}}</a></li>
                                @endauth
                                {{-- <li><a href="#" class="d-none d-lg-block"> <i class="fa-brands fa-twitter"></i></a></li>
                                <li><a href="#" class="d-none d-lg-block"><i class="fa-brands fa-instagram"></i></a></li>
                                <li><a href="#" class="d-none d-lg-block"><i class="fa-brands fa-skype"></i></a></li> --}}
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>