<!-- Navbar Start -->
<div class="navbar navbar-expand-lg nav-bar sticky-top bg-white">
    <nav class="container bg-white navbar-light py-0 px-4">
        <a href="{{ route('home') }}" class="navbar-brand d-flex align-items-center text-center">
            <div class="icon p-2 me-2">
                <img class="img-fluid" src="{{ url('frontend/img/icon-deal.png') }}" alt="Icon"
                    style="width: 30px; height: 30px;">
            </div>
            <h1 class="m-0 text-primary">Makan</h1>
        </a>
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <nav class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav ms-auto">
                <li>
                    <a href="{{ route('home') }}"
                        class="nav-item nav-link {{ request()->is('/') ? 'active' : '' }}">Beranda</a>
                </li>
                <li>
                    <a href="{{ route('kuliner') }}"
                        class="nav-item nav-link {{ request()->is('kuliner') ? 'active' : '' }}">Kuliner</a>
                </li>

            </ul>

            @auth
            <a href="{{route('cart.list')}}" class=" background-button me-2" >
                <div class="icon-header-item icon-header-noti" data-notify="{{ $cartCount }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                        class="bi bi-bag-fill" viewBox="0 0 16 16">
                        <path
                            d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5z" />
                    </svg>
                </div>
            </a>
            @endauth

            @guest
            <a href="{{route('cart.list')}}" class=" background-button me-2" >
                <div class="icon-header-item">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                        class="bi bi-bag-fill" viewBox="0 0 16 16">
                        <path
                            d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5z" />
                    </svg>
                </div>
            </a>
            @endguest

            @auth
            @if ($roles != "ADMIN")
            <div class="ps-md-3">
                <a href="{{ route('open.create') }}" class="btn btn-primary px-3 nav-item">Buka Resto</a>
            </div>
            @endif

            @endauth



            @guest
                <div class="ps-md-3">
                    <a href="{{ route('auth') }}" class="btn btn-primary px-3 nav-item">MASUK</a>
                </div>
            @endguest
            @auth
                <div class=" dropdown user-area">
                    <a href="#" class="nav-link" data-bs-toggle="dropdown">
                        <img class="user-avatar rounded-circle img-thumbnail"
                            src="https://ui-avatars.com/api/?name={{ $user->name }}" alt="User Avatar">
                    </a>
                    <div class="user-menu dropdown-menu rounded-3 m-0">
                        <a class="nav-link" href="{{ route('transaction-user') }}"><i class="fa fa- user"></i>Pemesanan</a>
                        <a class="nav-link" href="{{ route('profile') }}"><i class="fa fa- user"></i>Profil</a>
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button type="submit" class="nav-link btn btn-logout" href="{{ route('logout') }}"><i
                                    class="fa fa-power -off"></i>Logout</button>
                        </form>
                    </div>
                </div>

            @endauth

        </nav>
    </nav>
</div>
<!-- Navbar End -->
