<div class="sidebar sidebar-dark sidebar-main sidebar-expand-md">
    <div class="sidebar-mobile-toggler text-center">
        <a href="#" class="sidebar-mobile-main-toggle"><i class="icon-arrow-left8"></i></a>Navigation
        <a href="#" class="sidebar-mobile-expand">
            <i class="icon-screen-full"></i>
            <i class="icon-screen-normal"></i>
        </a>
    </div>
    <div class="sidebar-content">
        <!-- User menu -->
        <div class="sidebar-user">
            <div class="card-body">
                <div class="media">
                    <div class="mr-3">
                        <a href="#"><img src="{{ asset('logo.png') }}" width="38" height="38" class="rounded-circle"
                                alt=""></a>
                    </div>
                    <div>
                        <h3>Dashboard</h3>
                    </div>
                </div>
            </div>
        </div>
        <!-- /user menu -->
        <!-- Main navigation -->
        <div class="card card-sidebar-mobile">
            <ul class="nav nav-sidebar" data-nav-type="accordion">

                <!-- Main -->
                <li class="nav-item-header">
                    <div class="text-uppercase font-size-xs line-height-xs">Main</div> <i class="icon-menu"
                        title="Main"></i>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.dashboard')}}" class="nav-link"><i class="icon-home4"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link"><i class="icon-train2"></i> <span>Stations</span></a>
                    <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                        <li class="nav-item"><a href="{{route('station.create')}}" class="nav-link active"><i
                                    class="icon-plus22"></i>
                                Create</a></li>
                        <li class="nav-item"><a href="{{route('station.view')}}" class="nav-link active"><i
                                    class="icon-eye8"></i>View</a></li>
                    </ul>
                </li>
                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link"><i class="icon-train"></i> <span>Trains</span></a>
                    <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                        <li class="nav-item"><a href="{{ route('train.create') }}" class="nav-link active"><i class="icon-plus22"></i>
                                Create</a></li>
                        <li class="nav-item"><a href="{{route('train.view')}}" class="nav-link active"><i class="icon-eye8"></i>View</a></li>
                    </ul>
                </li>
                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link"><i class="icon-road"></i> <span>Route</span></a>
                    <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                        <li class="nav-item"><a href="" class="nav-link active"><i class="icon-plus22"></i>
                                Create</a></li>
                        
                        <li class="nav-item"><a href="" class="nav-link active"><i class="icon-eye8"></i>View</a></li>
                    </ul>
                </li>
                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link"><i class="icon-map"></i> <span>Route Stops</span></a>
                    <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                        <li class="nav-item"><a href="  " class="nav-link active">Default layout</a></li>
                    </ul>
                </li>
                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link"><i class="icon-grid"></i> <span>Coaches</span></a>
                    <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                        <li class="nav-item"><a href="{{ route('coach.create') }}" class="nav-link active"><i class="icon-plus22"></i>
                                Create</a></li>
                        <li class="nav-item"><a href="{{ route('coach.view') }}" class="nav-link active"><i class="icon-eye8"></i>View</a></li>
                    </ul>
                </li>
                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link"><i class="icon-chair"></i> <span>Seats</span></a>
                    <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                        <li class="nav-item"><a href="" class="nav-link active"><i class="icon-plus22"></i>
                                Create</a></li>
                        <li class="nav-item"><a href="" class="nav-link active"><i class="icon-eye8"></i>View</a></li>
                    </ul>
                </li>
                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link"><i class="icon-location4"></i> <span>Trips</span></a>
                    <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                        <li class="nav-item"><a href="" class="nav-link active"><i class="icon-plus22"></i>
                                Create</a></li>
                        <li class="nav-item"><a href="" class="nav-link active"><i class="icon-pencil4"></i> Edit</a>
                        </li>
                        <li class="nav-item"><a href="" class="nav-link active"><i class="icon-eye8"></i>View</a></li>
                    </ul>
                </li>
                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link"><i class="icon-price-tag"></i> <span>Fares</span></a>
                    <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                        <li class="nav-item"><a href="" class="nav-link active"><i class="icon-plus22"></i>
                                Create</a></li>
                        <li class="nav-item"><a href="" class="nav-link active"><i class="icon-pencil4"></i> Edit</a>
                        </li>
                        <li class="nav-item"><a href="" class="nav-link active"><i class="icon-eye8"></i>View</a></li>
                    </ul>
                </li>
                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link"><i class="icon-ticket"></i> <span>Bookings</span></a>
                    <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                        <li class="nav-item"><a href="  " class="nav-link active">Default layout</a></li>
                    </ul>
                </li>
                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link"><i class="icon-stack"></i> <span>Booking Seats</span></a>
                    <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                        <li class="nav-item"><a href="  " class="nav-link active">Default layout</a></li>
                    </ul>
                </li>
                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link"><i class="icon-cash3"></i> <span>Payments</span></a>
                    <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                        <li class="nav-item"><a href="  " class="nav-link active">Default layout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>

</div>