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
                        <a href="{{route('admin.dashboard')}}"><img src="{{ asset('logo.png') }}" width="38" height="38" class="rounded-circle"
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
                    <a href="{{route('admin.dashboard')}}" class="nav-link {{request()->routeIs('admin.dashboard') ? 'active' : ' '}}"><i class="icon-home4"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="nav-item nav-item-submenu {{request()->routeIs('station.*') ? 'nav-item-open' : ''}}">
                    <a href="#" class="nav-link {{request()->routeIs('station.*') ? 'active' : ' '}}"><i class="icon-train2"></i> <span>Stations</span></a>
                    <ul class="nav nav-group-sub" style="{{request()->routeIs('station.*') ? 'display:block' : ''}}" data-submenu-title="Layouts">
                        <li class="nav-item"><a href="{{route('station.create')}}" class="nav-link {{request()->routeIs('station.create') ? 'active' : ''}}"><i
                                    class="icon-plus22"></i>
                                Create</a></li>
                        <li class="nav-item"><a href="{{route('station.view')}}" class="nav-link {{request()->routeIs('station.view') ? 'active' : ''}}"><i
                                    class="icon-eye8"></i>View</a></li>
                    </ul>
                </li>

                {{-- Trains --}}

                <li class="nav-item nav-item-submenu {{request()->routeIs('train.*') ? 'nav-item-open' : '' }}">
                    <a href="#" class="nav-link {{request()->routeIs('trains.*') ? 'active' : '' }}"><i class="icon-train"></i> <span>Trains</span></a>
                    <ul class="nav nav-group-sub" style="{{request()->routeIs('train.*') ? 'display:block' : '' }}" data-submenu-title="Layouts">
                        <li class="nav-item"><a href="{{ route('train.create') }}" class="nav-link {{request()->routeIs('train.create') ? 'active' : '' }}"><i
                                    class="icon-plus22"></i>
                                Create</a></li>
                        <li class="nav-item"><a href="{{route('train.view')}}" class="nav-link {{request()->routeIs('train.view') ? 'active' : '' }}"><i
                                    class="icon-eye8"></i>View</a></li>
                    </ul>
                </li>

                {{-- Route Stops --}}

                <li class="nav-item nav-item-submenu {{request()->routeIs('route.*') ? 'nav-item-open' : ''}}">
                    <a href="#" class="nav-link {{request()->routeIs('route.*') ? 'active' : ''}}"><i class="icon-map"></i> <span>Routes</span></a>
                    <ul class="nav nav-group-sub" data-submenu-title="Layouts" style="{{request()->routeIs('route.*') ? 'display:block' : ''}}">

                        <li class="nav-item"><a href="{{ route('route.create') }}" class="nav-link {{request()->routeIs('route.create') ? 'active' : ''}}"><i class="icon-plus22"></i>Create</a></li>

                        <li class="nav-item"><a href="{{ route('route.view') }}" class="nav-link {{request()->routeIs('route.view') ? 'active' : ''}}"><i class="icon-eye8"></i>View</a></li>

                    </ul>
                </li>

                {{-- Coaches --}}

                <li class="nav-item nav-item-submenu {{request()->routeIs('coach.*') ? 'nav-item-open' : ''}}">
                    <a href="#" class="nav-link {{request()->routeIs('coach.*') ? 'active' : ''}}"><i class="icon-grid"></i> <span>Coaches</span></a>
                    <ul class="nav nav-group-sub" data-submenu-title="Layouts" style="{{request()->routeIs('coach.*') ? 'display:block' : ''}}">
                        <li class="nav-item"><a href="{{ route('coach.create') }}" class="nav-link {{request()->routeIs('coach.create') ? 'active' : ''}}"><i
                                    class="icon-plus22"></i>
                                Create</a></li>
                        <li class="nav-item"><a href="{{ route('coach.view') }}" class="nav-link {{request()->routeIs('coach.view') ? 'active' : ''}}"><i
                                    class="icon-eye8"></i>View</a></li>
                    </ul>
                </li>

                {{-- Seats --}}

                <li class="nav-item nav-item-submenu {{request()->routeIs('seat.*') ? 'nav-item-open' : ''}}">
                    <a href="#" class="nav-link {{request()->routeIs('seat.*') ? 'active' : ''}}"><i class="icon-chair"></i> <span>Seats</span></a>
                    <ul class="nav nav-group-sub" style="{{request()->routeIs('seat.*')? 'display:block':''}}" data-submenu-title="Layouts">
                        <li class="nav-item ">
                            <a href="{{ route('seat.create') }}" class="nav-link {{request()->routeIs('seat.create') ? 'active' : ''}}">
                                <i class="icon-plus22"></i>
                                Create
                            </a>
                        </li>
                        <li class="nav-item "><a href="{{route('seat.view')}}" class="nav-link {{request()->routeIs('seat.view') ? 'active' : ''}}"><i class="icon-eye8"></i>View</a></li>
                    </ul>
                </li>

                {{-- Trips --}}

                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link"><i class="icon-location4"></i> <span>Trips</span></a>
                    <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                        <li class="nav-item"><a href="#" class="nav-link"><i class="icon-plus22"></i>
                                Create</a></li>
                        <li class="nav-item"><a href="{{ route('trip.create') }}" class="nav-link"><i class="icon-eye8"></i>View</a></li>
                    </ul>
                </li>

                {{-- Fares --}}

                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link"><i class="icon-price-tag"></i> <span>Fares</span></a>
                    <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                        <li class="nav-item"><a href="{{ route('fare.create') }}" class="nav-link"><i class="icon-plus22"></i>
                                Create</a></li>
                        <li class="nav-item"><a href="#" class="nav-link"><i class="icon-eye8"></i>View</a></li>
                    </ul>
                </li>
                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link"><i class="icon-ticket"></i> <span>Bookings</span></a>
                    <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                        <li class="nav-item"><a href="  " class="nav-link">Default layout</a></li>
                    </ul>
                </li>
                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link"><i class="icon-stack"></i> <span>Booking Seats</span></a>
                    <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                        <li class="nav-item"><a href="  " class="nav-link ">Default layout</a></li>
                    </ul>
                </li>
                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link"><i class="icon-cash3"></i> <span>Payments</span></a>
                    <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                        <li class="nav-item"><a href="  " class="nav-link ">Default layout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>

</div>
