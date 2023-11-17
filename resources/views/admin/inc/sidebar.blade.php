<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="index.html" class="logo logo-dark">
            <span class="logo-sm">
                <img src="assets/images/logo-sm.png" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="assets/images/logo-dark.png" alt="" height="17">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="index.html" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ config('app.url') }}/assets/images/ganpati-logo.png" alt="" height="35">
            </span>
            <span class="logo-lg">
                <img src="{{ config('app.url') }}/assets/images/ganpati-logo.png" alt="" height="70">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                <!-- Dashboard Menu -->

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarDashboards" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarDashboards">
                        <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards"
                            style="font-size: 18px">Dashboards</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarDashboards">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="dashboard-analytics.html" class="nav-link" data-key="t-analytics"
                                    style="font-size: 15px;">
                                    Analytics </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <!-- End Dashboard Menu -->

                <!-- Admin Menu -->
                @if (Auth()->user()->hasRole('admin'))
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#members" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="members">
                        <i class="ri-group-fill"></i> <span data-key="t-dashboards"
                            style="font-size: 18px">Members</span>
                    </a>
                    <div class="collapse menu-dropdown" id="members">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('members.index') }}" class="nav-link" data-key="t-analytics"
                                    style="font-size: 15px;">
                                    View </a>
                            </li>
                        </ul>
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('members.create') }}" class="nav-link" data-key="t-analytics"
                                    style="font-size: 15px;">
                                    Create </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#society" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="society">
                        <i class="ri-building-2-fill"></i> <span data-key="t-dashboards"
                            style="font-size: 18px">Society</span>
                    </a>
                    <div class="collapse menu-dropdown" id="society">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('society.index') }}" class="nav-link" data-key="t-analytics"
                                    style="font-size: 15px;">
                                    View </a>
                            </li>
                        </ul>
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('society.create') }}" class="nav-link" data-key="t-analytics"
                                    style="font-size: 15px;">
                                    Create</a>
                            </li>
                        </ul>
                    </div>
                </li>
                @endif

                @if (Auth()->user()->hasRole('secretary'))
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#guard" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="guard">
                        <i class="ri-shield-user-fill"></i> <span data-key="t-dashboards"
                            style="font-size: 18px">Guard</span>
                    </a>
                    <div class="collapse menu-dropdown" id="guard">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('guard.index') }}" class="nav-link" data-key="t-analytics"
                                    style="font-size: 15px;">
                                    Veiw </a>
                            </li>
                        </ul>
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('guard.create') }}" class="nav-link" data-key="t-analytics"
                                    style="font-size: 15px;">
                                    Create </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#resident" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="resident">
                        <i class="ri-group-fill"></i> <span data-key="t-dashboards"
                            style="font-size: 18px">Resident</span>
                    </a>
                    <div class="collapse menu-dropdown" id="resident">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('resident.index') }}" class="nav-link" data-key="t-analytics"
                                    style="font-size: 15px;">
                                    View </a>
                            </li>
                        </ul>
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('resident.create') }}" class="nav-link" data-key="t-analytics"
                                    style="font-size: 15px;">
                                    Create </a>
                            </li>
                        </ul>
                    </div>
                </li>
                @endif
                <!-- End Admin Menu -->

            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>
<div class="vertical-overlay"></div>
