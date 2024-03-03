<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item {{ Request::is('admin/dashboard') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('admin/dashboard') }}">
                <i class="mdi mdi-home menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <!-- Orders -->
        <li class="nav-item {{ Request::is('admin/orders') ? 'active' : '' }}">
            <a href="{{ url('admin/orders') }}" class="nav-link">
                <i class="mdi mdi-sale menu-icon"></i>
                <span class="menu-title">Orders</span>
            </a>
        </li>
        <!-- Category -->
        <li class="nav-item {{ Request::is('admin/category*') ? 'active' : '' }}">
            <a class="nav-link collapsed" data-bs-toggle="collapse" href="#categoryMenu" aria-expanded="false"
                aria-controls="categoryMenu">
                <i class="mdi mdi-circle-outline menu-icon"></i>
                <span class="menu-title">Category</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ Request::is('admin/category*') ? 'show' : '' }}" id="categoryMenu">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('admin/category/create') ? 'active' : '' }}"
                            href="{{ url('admin/category/create') }}"
                            aria-expanded="{{ Request::is('admin/category/create') ? 'true' : 'false' }}">Add
                            Category</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('admin/category') ? 'active' : '' }}"
                            href="{{ url('admin/category') }}"
                            aria-expanded="{{ Request::is('admin/category') ? 'true' : 'false' }}">View
                            Category</a>
                    </li>
                </ul>
            </div>
        </li>
        <!-- Products -->
        <li class="nav-item {{ Request::is('admin/products*') ? 'active' : '' }}">
            <a class="nav-link collapsed" data-bs-toggle="collapse" href="#productMenu" aria-expanded="false"
                aria-controls="productMenu">
                <i class="mdi mdi-file-document-box-outline menu-icon"></i>
                <span class="menu-title">Products</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ Request::is('admin/products*') ? 'show' : '' }}" id="productMenu">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('admin/products/create') ? 'active' : '' }}"
                            href="{{ url('admin/products/create') }}"
                            aria-expanded="{{ Request::is('admin/products/create') ? 'true' : 'false' }}">Add
                            Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('admin/products') ? 'active' : '' }}"
                            href="{{ url('admin/products') }}"
                            aria-expanded="{{ Request::is('admin/products') ? 'true' : 'false' }}">View Products</a>
                    </li>
                </ul>
            </div>
        </li>
        <!-- Brands -->
        <li class="nav-item {{ Request::is('admin/brands') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('admin/brands') }}">
                <i class="mdi mdi-chart-pie menu-icon"></i>
                <span class="menu-title">Brands</span>
            </a>
        </li>
        <!-- Colors -->
        <li class="nav-item {{ Request::is('admin/colors') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('admin/colors') }}">
                <i class="mdi mdi-view-headline menu-icon"></i>
                <span class="menu-title">Colors</span>
            </a>
        </li>
        <!-- Home Sliders -->
        <li class="nav-item {{ Request::is('admin/sliders') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('admin/sliders') }}">
                <i class="mdi mdi-emoticon menu-icon"></i>
                <span class="menu-title">Home Sliders</span>
            </a>
        </li>
        <!-- User Pages -->
        <li class="nav-item {{ Request::is('admin/users*') ? 'active' : '' }}">
            <a class="nav-link collapsed" data-bs-toggle="collapse" href="#userPages" aria-expanded="false"
                aria-controls="userPages">
                <i class="mdi mdi-account menu-icon"></i>
                <span class="menu-title">User Pages</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ Request::is('admin/users*') ? 'show' : '' }}" id="userPages">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('admin/users/create') ? 'active' : '' }} "
                            href="{{ url('admin/users/create') }}"
                            aria-expanded="{{ Request::is('admin/users/create') ? 'true' : 'false' }}">Add user</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('admin/users') ? 'active' : '' }}"
                            href="{{ url('admin/users') }}"
                            aria-expanded="{{ Request::is('admin/users') ? 'true' : 'false' }}">View users</a>
                    </li>
                </ul>
            </div>
        </li>
        <!-- Site Settings -->
        <li class="nav-item {{ Request::is('admin/settings') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('/admin/settings') }}">
                <i class="mdi mdi-settings menu-icon"></i>
                <span class="menu-title">Site Settings</span>
            </a>
        </li>
    </ul>
</nav>
