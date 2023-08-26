    <!-- Left Panel -->
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="{{ request()->is('resto') ? 'active' : '' }}">
                        <a href="{{route('dashboard-resto')}}"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                    </li>
                    <li class="{{ request()->is('resto/food') ? 'active' : '' }}">
                        <a href="{{route('food.index')}}"><i class="menu-icon fa fa-cutlery" aria-hidden="true"></i>Makanan </a>
                    </li>
                    <li class="{{ request()->is('resto/transaction') ? 'active' : '' }}">
                        <a href="{{route('transaction.index')}}"><i class="menu-icon fa fa-money" aria-hidden="true"></i>Transaksi </a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>
    <!-- /#left-panel -->
