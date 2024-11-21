
<!-- Sidebar (I removed the Shipping Details option in sidebar)-->
<div class="sidebar" >
    <!-- Sidebar user panel (optional) -->
    
    <!-- Sidebar Menu -->
    <nav class="mt-2" > 
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            @if(Auth::user()->staff->position != 'Engineer')
            @if (Auth::user()->staff->position == 'Admin')
            <li class="nav-item" >
                <a href="{{ route('home') }}" class="nav-link" style="color:white">
                    <i class="nav-icon fas fa-th"></i>
                    <p>{{ __('DASHBOARD') }}</p>
                </a>
            </li>
            @endif
            <li class="nav-item">
                <a href="{{ route('customer') }}" class="nav-link" style="color:white">
                    <i class="nav-icon fas fa-users"></i>
                    <p>{{ __('CUSTOMERS') }}</p>
                </a>
            </li>
            @if (Auth::user()->staff->position == 'Admin')
            <li class="nav-item">
                <a href="{{ route('users.index') }}" class="nav-link" style="color:white">
                    <i class="nav-icon far fa-address-card"></i>
                    <p>{{ __('STAFF') }}</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('price') }}" class="nav-link" style="color:white">
                    <i class="nav-icon fas fa-tags"></i>
                    <p>{{ __('PRICE LIST') }}</p>
                </a>
            </li>
            @endif
            @endif
            <li class="nav-item" >
                <a href="{{ route('p.view') }}" class="nav-link" style="color:white">
                    <i class="nav-icon fa-solid fa-clipboard-list"></i>
                    <p>VIEW ORDERS</p>
                </a>
            </li>
            <!--<li class="nav-item">
                <a href="#" class="nav-link" style="color:white">
                    <i class="nav-icon fas fa-shipping-fast nav-icon"></i>
                    <p>
                        SHIPPING DETAILS
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview" style="display: none;">
                    <li class="nav-item" >
                        <a href="{{ route('o.view') }}" class="nav-link" style="color:white">
                            <i class="fas fa-eye nav-icon"></i>
                            <p>SCAN ORDER</p>
                        </a>
                    </li>
                    <li class="nav-item" >
                        <a href="{{ route('o.pick') }}" class="nav-link" style="color:white">
                            <i class="fas fa-qrcode nav-icon"></i>
                            <p>UPDATE STATUS</p>
                        </a>
                    </li>
                    <li class="nav-item" >
                        <a href="{{ route('o.weight') }}" class="nav-link" style="color:white">
                            <i class="fa-solid fa-weight-hanging nav-icon"></i>
                            <p>CARGO WEIGHING</p>
                        </a>
                    </li>
                    <li class="nav-item" >
                        <a href="{{ route('o.table') }}" class="nav-link" style="color:white">
                            <i class="fas fa-box nav-icon"></i>
                            <p>CARGO TABLE</p>
                        </a>
                    </li>
                </ul>
            </li>-->
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->