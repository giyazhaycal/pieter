<nav id="sidebar">
    <div id="sidebar-scroll">
        <div class="sidebar-content">
            <div class="side-header side-content bg-white-op">
                <button class="btn btn-link text-gray pull-right hidden-md hidden-lg" type="button" data-toggle="layout" data-action="sidebar_close">
                    <i class="fa fa-times"></i>
                </button>
                <div class="btn-group pull-right">
                    <button class="btn btn-link text-gray dropdown-toggle" data-toggle="dropdown" type="button">
                        <i class="si si-drop"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-right font-s13 sidebar-mini-hide">
                        <li>
                            <a data-toggle="theme" data-theme="default" tabindex="-1" href="javascript:void(0)">
                                <i class="fa fa-circle text-default pull-right"></i> <span class="font-w600">Default</span>
                            </a>
                        </li>
                        <li>
                            <a data-toggle="theme" data-theme="{{ asset('asset/css/themes/amethyst.min.css') }}" tabindex="-1" href="javascript:void(0)">
                                <i class="fa fa-circle text-amethyst pull-right"></i> <span class="font-w600">Amethyst</span>
                            </a>
                        </li>
                        <li>
                            <a data-toggle="theme" data-theme="{{ asset('asset/css/themes/city.min.css') }}" tabindex="-1" href="javascript:void(0)">
                                <i class="fa fa-circle text-city pull-right"></i> <span class="font-w600">City</span>
                            </a>
                        </li>
                        <li>
                            <a data-toggle="theme" data-theme="{{ asset('asset/css/themes/flat.min.css') }}" tabindex="-1" href="javascript:void(0)">
                                <i class="fa fa-circle text-flat pull-right"></i> <span class="font-w600">Flat</span>
                            </a>
                        </li>
                        <li>
                            <a data-toggle="theme" data-theme="{{ asset('asset/css/themes/modern.min.css') }}" tabindex="-1" href="javascript:void(0)">
                                <i class="fa fa-circle text-modern pull-right"></i> <span class="font-w600">Modern</span>
                            </a>
                        </li>
                        <li>
                            <a data-toggle="theme" data-theme="{{ asset('asset/css/themes/smooth.min.css') }}" tabindex="-1" href="javascript:void(0)">
                                <i class="fa fa-circle text-smooth pull-right"></i> <span class="font-w600">Smooth</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <a class="h5 text-white" href="index.html">
                    PIET
                </a>
            </div>
            <!-- END Side Header -->

            <!-- Side Content -->
            <div class="side-content">
                <ul class="nav-main">
                    <li>
                        <a class="active" href="base_pages_dashboard.html"><i class="si si-speedometer"></i><span class="sidebar-mini-hide">Dashboard</span></a>
                    </li>
                    <li class="nav-main-heading"><span class="sidebar-mini-hide">User Interface</span></li>
                    <li>
                        <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-user"></i><span class="sidebar-mini-hide">Users</span></a>
                        <ul>
                            <li>
                                <a href="{{ url('customer') }}">Customer</a>
                            </li>
                            <li>
                                <a href="{{ url('tukang') }}">Tukang</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-grid"></i><span class="sidebar-mini-hide">Orders</span></a>
                        <ul>
                            <li>
                                <a href="{{ url('orders') }}">All Orders</a>
                            </li>
                            <li>
                                <a href="{{ url('orders/pending') }}">Pending</a>
                            </li>
                            <li>
                                <a href="{{ url('orders/accepted') }}">Accepted</a>
                            </li>
                            <li>
                                <a href="{{ url('orders/completed') }}">Completed</a>
                            </li>
                            <li>
                                <a href="{{ url('orders/cancelled') }}">Canceled</a>
                            </li>
                        </ul>
                    </li>
                    
                </ul>
            </div>
            <!-- END Side Content -->
        </div>
        <!-- Sidebar Content -->
    </div>
    <!-- END Sidebar Scroll Container -->
</nav>