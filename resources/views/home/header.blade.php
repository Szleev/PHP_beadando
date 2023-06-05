<header class="header_section">

    <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
            <a class="navbar-brand" href="{{url('/')}}"><img width="250" src="images/logo.png" alt="#" /></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class=""> </span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{url('/')}}">Főoldal <span class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{url('show_order')}}">Rendeléseim</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fa fa-shopping-cart" style="font-size: 20px" href="{{url('show_cart')}}"></a>
                    </li>


                    @if (Route::has('login'))
                    @auth
                    <li class="nav-item">
                        <x-app-layout>

                        </x-app-layout>
                    </li>
                        @else
                            <li class="nav-item">
                                <a class="btn btn-danger mr-3" href="{{ route('login') }}">Belépés</a>
                            </li>
                    <li class="nav-item">
                        <a class="btn btn-danger" href="{{ route('register') }}">Regisztráció</a>
                    </li>
                        @endauth
                    @endif

                </ul>
            </div>
        </nav>
    </div>
</header>
