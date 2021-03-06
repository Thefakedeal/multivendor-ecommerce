<nav class="navbar navbar-expand-lg navbar-light white scrolling-navbar">
    <div class="container">

        <!-- Brand -->
        <a class="navbar-brand waves-effect" href="{{ route('frontend.home') }}">
            <strong class="lead">{{ config('app.name', 'Laravel') }}</strong>
        </a>

        <!-- Collapse -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Links -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <!-- Left -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item @if(Request::routeIs('frontend.home')) active @endif">
                    <a class="nav-link waves-effect" href="{{ route('frontend.home') }}">Home
                    </a>
                </li>
                <li class="nav-item @if(Request::routeIs('frontend.products.index')) active @endif">
                    <a class="nav-link waves-effect" href="{{ route('frontend.products.index') }}">Products
                    </a>
                </li>
            </ul>

            <!-- Right -->
            <ul class="navbar-nav nav-flex-icons">
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a href="{{ route('login') }}" class="nav-link border border-light rounded waves-effect"
                                >
                                <i class="fa fa-user" aria-hidden="true"></i></i>
                                <span class="mx-1">Login</span>
                            </a>
                        </li>
                    @endif
                    
                @else
                    <li class="nav-item">
                        <a href="{{ route('user.cart.index') }}" class="nav-link waves-effect">
                            <i class="fas fa-shopping-cart"></i>
                            <span class="clearfix d-none d-sm-inline-block mx-1"> Cart </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('user.orders.index') }}" class="nav-link waves-effect">
                            <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                            <span class="clearfix d-none d-sm-inline-block mx-1"> Orders </span>
                        </a>
                    </li>
                    @if (Route::has('logout'))
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="nav-link btn-link border border-light rounded waves-effect"
                                >
                                <i class="fa fa-sign-out-alt" aria-hidden="true"></i>
                                <span class="mx-1 clearfix d-none d-sm-inline-block">Logout</span>
                            </button>
                        </form>
                    </li>
                    @endif
                @endguest
            </ul>

        </div>

    </div>
</nav>
