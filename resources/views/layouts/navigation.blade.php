<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            @if (Auth::user()->position == 'Admin' || Auth::user()->position != 'Engineer')
                @if (Auth::user()->position == 'Admin')
                    <li class="nav-item">
                        <a href="{{ route('home') }}" class="nav-link" style="color:white">
                            <i class="nav-icon fas fa-th"></i>
                            <p>{{ __('DASHBOARD') }}</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('users.index') }}" class="nav-link" style="color:white">
                            <i class="nav-icon far fa-address-card"></i>
                            <p>{{ __('STAFF') }}</p>
                        </a>
                    </li>
                @endif
                <li class="nav-item">
                    <a href="{{ route('customer') }}" class="nav-link" style="color:white">
                        <i class="nav-icon fas fa-users"></i>
                        <p>{{ __('CUSTOMERS') }}</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('price') }}" class="nav-link" style="color:white">
                        <i class="nav-icon fas fa-tags"></i>
                        <p>{{ __('PRICE LIST') }}</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('p.view') }}" class="nav-link" style="color:white">
                        <i class="nav-icon fa-solid fa-clipboard-list"></i>
                        <p>{{ __('MASTER LIST') }}</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('bl.view') }}" class="nav-link" style="color:white">
                        <i class="nav-icon fa-solid fa-clipboard-list"></i>
                        <p>{{ __('CREATE TEMPORARY BL') }}</p>
                    </a>
                </li>
                
            @endif
        </ul>
    </nav>
    
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
