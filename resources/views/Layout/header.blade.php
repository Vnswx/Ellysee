<!-- ***** Header Area Start ***** -->
<style>
    .btn:focus {
        box-shadow: none !important;
    }

    #dropdownMenuButton:hover {
        color: #e83e8c !important;
    }

    #dropdownMenuButton {
        font-weight: 500 !important;
        font-size: 13px !important;
        transition: all 0.3s ease 0s !important;
        position: relative !important;
        margin-right: 30px !important;
    }

    .search__input {
        width: 240%;
        padding: 12px 24px;

        background-color: transparent;
        transition: transform 250ms ease-in-out;
        font-size: 12px;
        line-height: 18px;

        color: #575756;
        background-color: transparent;
        /*         background-image: url(http://mihaeltomic.com/codepen/input-search/ic_search_black_24px.svg); */

        background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24'%3E%3Cpath d='M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z'/%3E%3Cpath d='M0 0h24v24H0z' fill='none'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-size: 18px 18px;
        background-position: 95% center;
        border-radius: 50px;
        border: 1px solid #575756;
        transition: all 250ms ease-in-out;
        backface-visibility: hidden;
        transform-style: preserve-3d;

    }

    .search__input::placeholder {
        color: color(#575756 a(0.8));
        text-transform: uppercase;
        letter-spacing: 1.5px;
        font-size: 12px;
    }

    .search__input:hover:focus {
        padding: 12px 0;
        outline: 0;
        border: 1px solid transparent;
        border-bottom: 1px solid #575756;
        border-radius: 0;
        background-position: 100% center;
    }
</style>
<header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav" style="display: flex; justify-content: space-between; justify-items: center">
                    <!-- ***** Logo Start ***** -->
                    <a href="#" class="logo">
                        Ellysee.
                    </a>
                    <ul class="nav mx-auto">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        @if (auth()->check() && auth()->user()->role === 'admin')
                        <li><a href="{{ route('admin-index') }}">Dashboard Admin</a></li>
                        @else
                            <li><a href="#work-process">Explore</a></li>
                        @endif
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" id="dropdownMenuLink" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                Create
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="{{ route('albums') }}">Album</a>
                                <a class="dropdown-item" href="{{ route('photos') }}">Photo</a>
                            </div>
                        </li>
                        <li>
                            <form action="{{ route('users.search') }}" method="GET">
                                <input class="search__input" type="text" placeholder="Search" name="search">
                            </form>
                        </li>
                    </ul>

                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav mx-auto">

                    </ul>
                    @if (!Auth::check())
                        <button onclick="window.location.href='{{ route('login') }}'" class="btn"
                            id="dropdownMenuButton">Login</button>
                    @else
                        <div class="dropdown" style="display: flex; float: left;">
                            <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <!-- Isi dropdown disini -->
                                <a class="dropdown-item" href="{{ route('profile') }}">Profile</a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    @endif

                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- ***** Header Area End ***** -->
