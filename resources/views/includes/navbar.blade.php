<!-- Navbar Start -->
<div class="navbar navbar-expand-lg nav-bar sticky-top bg-white">
    <nav class="container bg-white navbar-light py-0 px-4">
        <a href="{{route('home')}}" class="navbar-brand d-flex align-items-center text-center">
            <div class="icon p-2 me-2">
                <img class="img-fluid" src="{{url('frontend/img/icon-deal.png')}}" alt="Icon" style="width: 30px; height: 30px;">
            </div>
            <h1 class="m-0 text-primary">Makan</h1>
        </a>
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto">
                <a href="{{route('home')}}" class="nav-item nav-link active">Beranda</a>
                <a href="{{route('kuliner')}}" class="nav-item nav-link">Kuliner</a>


                <a href="#" class="nav-item nav-link">kontak</a>
            </div>
            @guest
            <a href="{{route('auth')}}" class="btn btn-primary px-3 d-none d-lg-flex">MASUK</a>
            @endguest
            @auth
            <div class="nav-item dropdown user-area">
                <a
                    href="#"
                    class="nav-link"
                    data-bs-toggle="dropdown">
                    <img class="user-avatar rounded-circle img-thumbnail" src="{{url('backend/images/admin.jpg')}}" alt="User Avatar">
                </a>
                <div class="user-menu dropdown-menu rounded-3 m-0">
                    <a class="nav-link" href="{{route('profile')}}"><i class="fa fa- user"></i>Profil</a>
                    <form action="{{route('logout')}}" method="post">
                        @csrf
                        <button
                        type="submit" class="nav-link btn btn-logout" href="{{route('logout')}}"><i class="fa fa-power -off"></i>Logout</button>
                    </form>
                </div>
            </div>

            @endauth
        </div>
    </nav>
</div>
<!-- Navbar End -->
