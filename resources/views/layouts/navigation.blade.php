
<!-- Sidebar (I removed the Shipping Details option in sidebar)-->
<div class="sidebar" >
    <!-- Sidebar user panel (optional) -->

    <!-- Sidebar Menu -->
    <nav class="mt-2" >
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            @if(Auth::user()->position != 'Engineer')
            @if (Auth::user()->position == 'Admin')
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
            @if (Auth::user()->position == 'Admin')
            <li class="nav-item">
                <a href="{{ route('users.index') }}" class="nav-link" style="color:white">
                    <i class="nav-icon far fa-address-card"></i>
                    <p>{{ __('STAFF') }}</p>
                </a>
            </li>
            @endif
            <li class="nav-item">
                <a href="{{ route('price') }}" class="nav-link" style="color:white">
                    <i class="nav-icon fas fa-tags"></i>
                    <p>{{ __('PRICE LIST') }}</p>
                </a>
            </li>
            @endif
            <li class="nav-item" >
                <a href="{{ route('p.view') }}" class="nav-link" style="color:white">
                    <i class="nav-icon fa-solid fa-clipboard-list"></i>
                    <p>MASTER LIST</p>
                </a>
            </li>
        </ul>
    </nav><!-- /.sidebar-menu -->
</div><!-- /.sidebar -->