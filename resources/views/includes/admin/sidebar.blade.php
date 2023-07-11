    <!-- Left Panel -->
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="{{ request()->is('admin') ? 'active' : '' }}">
                        <a href="{{route('dashboard')}}"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                    </li>
                    <li class="{{ request()->is('admin/kuliner-place') ? 'active' : '' }}">
                        <a href="{{route('kuliner-place.index')}}"><i class="menu-icon fa fa-home"></i>Restoran </a>
                    </li>
                    <li class="{{ request()->is('admin/booking-number') ? 'active' : '' }}">
                        <a href="{{route('booking-number.index')}}"><i class="menu-icon fa fa-sort-numeric-asc"></i>Nomer Booking </a>
                    </li>
                    <li class="{{ request()->is('admin/food') ? 'active' : '' }}">
                        <a href="{{route('food.index')}}"><i class="menu-icon fa fa-cutlery" aria-hidden="true"></i>Makanan </a>
                    </li>
                    <li class="{{ request()->is('admin/transaction') ? 'active' : '' }}">
                        <a href="{{route('transaction.index')}}"><i class="menu-icon fa fa-money"></i>Transaksi </a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>
    <!-- /#left-panel -->
