<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
        <a href="{{ route('home') }}" class="navbar-brand">
            <img src="{{ asset('images/telecom.png') }}" alt="МУИТ лого" class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text font-weight-light">Nur IT Telecom</span>
        </a>

        <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse order-3" id="navbarCollapse">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link">Басты бет</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('page',2) }}" class="nav-link">Интернет</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('page',1) }}" class="nav-link">Теледидар</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('page',3) }}" class="nav-link">Интернет+Теледидар</a>
                </li>
            </ul>

{{--            <!-- SEARCH FORM -->--}}
{{--            <form class="form-inline ml-0 ml-md-3">--}}
{{--                <div class="input-group input-group-sm">--}}
{{--                    <input class="form-control form-control-navbar" type="search" placeholder="Искать..." aria-label="Search">--}}
{{--                    <div class="input-group-append">--}}
{{--                        <button class="btn btn-navbar" type="submit">--}}
{{--                            <i class="fas fa-search"></i>--}}
{{--                        </button>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </form>--}}
        </div>

        <!-- Right navbar links -->
        <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">

            <li class="nav-item dropdown">
                @if(Auth::check())
                <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">{{ Auth::user()->getUserName() }}</a>
                <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                    @if(Auth::user()->isAdmin())
                    <li><a href="{{ route('admin.main') }}" class="dropdown-item">Администратор беті</a></li>
                    @elseif(Auth::user()->isUser())
                    <li><a href="{{route('application',Auth::user()->id)}}" class="dropdown-item">Менің жазбаларым</a></li>
                    @endif
                    <li><a href="{{ route('auth.signout') }}" class="dropdown-item">Шығу</a></li>
                </ul>
                @else
                <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Авторизация</a>
                <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                    <li><a href="{{ route('auth.signin') }}" class="dropdown-item">Кіру </a></li>
                    <li><a href="{{ route('auth.signup') }}" class="dropdown-item">Тіркелу</a></li>
                </ul>
                @endif
            </li>
        </ul>
    </div>
</nav>
