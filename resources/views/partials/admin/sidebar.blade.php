<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="index.html">
                <i class="mdi mdi-home menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <!-- Orders -->
        <li class="nav-item">
            <a href="{{ url('admin/orders') }}" class="nav-link">
                <i class="mdi mdi-sale menu-icon"></i>
                <span class="menu-title">Orders</span>
            </a>
        </li>
        <!-- Category -->
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-toggle="collapse" href="#categoryMenu" aria-expanded="false"
                aria-controls="categoryMenu">
                <i class="mdi mdi-circle-outline menu-icon"></i>
                <span class="menu-title">Category</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="categoryMenu">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('admin/category/create') }}">Add Category</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('admin/category') }}">View Category</a>
                    </li>
                </ul>
            </div>
        </li>
        <!-- Products -->
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-toggle="collapse" href="#productMenu" aria-expanded="false"
                aria-controls="productMenu">
                <i class="mdi mdi-file-document-box-outline menu-icon"></i>
                <span class="menu-title">Products</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="productMenu">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('admin/products/create') }}">Add Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('admin/products') }}">View Products</a>
                    </li>
                </ul>
            </div>
        </li>
        <!-- Brands -->
        <li class="nav-item">
            <a class="nav-link" href="{{ url('admin/brands') }}">
                <i class="mdi mdi-view-headline menu-icon"></i>
                <span class="menu-title">Brands</span>
            </a>
        </li>
        <!-- Colors -->
        <li class="nav-item">
            <a class="nav-link" href="{{ url('admin/colors') }}">
                <i class="mdi mdi-view-headline menu-icon"></i>
                <span class="menu-title">Colors</span>
            </a>
        </li>
        <!-- Home Sliders -->
        <li class="nav-item">
            <a class="nav-link" href="{{ url('admin/sliders') }}">
                <i class="mdi mdi-emoticon menu-icon"></i>
                <span class="menu-title">Home Sliders</span>
            </a>
        </li>
        <!-- Charts -->
        <li class="nav-item">
            <a class="nav-link" href="pages/charts/chartjs.html">
                <i class="mdi mdi-chart-pie menu-icon"></i>
                <span class="menu-title">Charts</span>
            </a>
        </li>
        <!-- Tables -->
        <li class="nav-item">
            <a class="nav-link" href="pages/tables/basic-table.html">
                <i class="mdi mdi-grid-large menu-icon"></i>
                <span class="menu-title">Tables</span>
            </a>
        </li>
        <!-- Icons -->
        <li class="nav-item">
            <a class="nav-link" href="pages/icons/mdi.html">
                <i class="mdi mdi-emoticon menu-icon"></i>
                <span class="menu-title">Icons</span>
            </a>
        </li>
        <!-- User Pages -->
        {{-- <li class="nav-item">
            <a class="nav-link collapsed" data-bs-toggle="collapse" href="#userPages" aria-expanded="false"
                aria-controls="userPages">
                <i class="mdi mdi-account menu-icon"></i>
                <span class="menu-title">User Pages</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="userPages">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="pages/samples/login.html">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pages/samples/login-2.html">Login 2</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pages/samples/register.html">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pages/samples/register-2.html">Register 2</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pages/samples/lock-screen.html">Lockscreen</a>
                    </li>
                </ul>
            </div>
        </li> --}}
        <!-- Site Settings -->
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/admin/settings') }}">
                <i class="mdi mdi-settings menu-icon"></i>
                <span class="menu-title">Site Settings</span>
            </a>
        </li>
    </ul>
</nav>
