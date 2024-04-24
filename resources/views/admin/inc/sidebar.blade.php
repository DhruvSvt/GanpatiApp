<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="{{ config('app.url') }}" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ config('app.url') }}/assets/images/logo-on-removebg-preview.png" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ config('app.url') }}/assets/images/logo-on-removebg-preview.png" alt="" height="17">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="#" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ config('app.url') }}/assets/images/logo-on-removebg-preview.png" alt="" height="35">
            </span>
            <span class="logo-lg">
                <img src="{{ config('app.url') }}/assets/images/logo-on-removebg-preview.png" alt="" height="30">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu" style="    border-bottom: 1px solid #ddd;
    background: aliceblue;
    margin: 0 !important;">
                <button type="button" class="btn" id="page-header-user-dropdown" data-bs-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <span class="d-flex align-items-center">
                        <img class="header-profile-user"
                            src="{{ config('app.url') }}/assets/images/user-badge-vector-removebg-preview.png"
                            alt="Header Avatar">
                        <span class="text-start ms-xl-2">
                            <span
                                class="d-none d-xl-inline-block ms-1 fw-medium user-name-text">{{ auth()->user()->name }}
                                Panel</span>
                            <span
                                class="d-none d-xl-block ms-1 fs-12 user-name-sub-text">{{ auth()->user()->role->display_name }}</span>
                        </span>
                    </span>
                </button>
            </div>
            <ul class="navbar-nav" id="navbar-nav">

                <!-- Dashboard Menu -->
                <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('admin.index') }}">
                        <i class="ri-dashboard-2-line"></i> <span data-key="t-widgets">Dashboards</span>
                    </a>
                </li>
                <li class="menu-title"><span data-key="t-menu">Policy</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#society" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="society">
                        <i class="ri-building-2-line"></i> <span data-key="t-dashboards">Policy</span>
                    </a>
                    <div class="collapse menu-dropdown" id="society">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('society.index') }}" class="nav-link" data-key="t-analytics"
                                    >
                                    Approve Policy </a>
                            </li>
                        </ul>
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('society.renewe') }}" class="nav-link" data-key="t-analytics"
                                    >
                                    Renew Policy</a>
                            </li>
                        </ul>
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('society.list') }}" class="nav-link" data-key="t-analytics"
                                    >
                                    View List</a>
                            </li>
                        </ul>
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('society.create') }}" class="nav-link" data-key="t-analytics"
                                    >
                                    Create</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#resident" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="resident">
                        <i class="ri-file-3-line"></i> <span data-key="t-dashboards">Policy Types</span>
                    </a>
                    <div class="collapse menu-dropdown" id="resident">

                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('resident.index') }}" class="nav-link" data-key="t-analytics"
                                    >
                                    View </a>
                            </li>
                        </ul>


                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('resident.create') }}" class="nav-link" data-key="t-analytics"
                                    >
                                    Create </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- End Dashboard Menu -->

                <!-- Admin Menu -->

                <li class="menu-title"><span data-key="t-menu">Members</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#Director" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="Director">
                        <i class="ri-user-2-line"></i> <span data-key="t-dashboards">Director</span>
                    </a>
                    <div class="collapse menu-dropdown" id="Director">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('director.index') }}" class="nav-link" data-key="t-analytics"
                                    >
                                    Veiw </a>
                            </li>
                        </ul>

                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('director.create') }}" class="nav-link" data-key="t-analytics"
                                    >
                                    Create </a>
                            </li>
                        </ul>

                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#members" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="members">
                        <i class="ri-user-3-line"></i> <span data-key="t-dashboards">TL</span>
                    </a>
                    <div class="collapse menu-dropdown" id="members">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('members.index') }}" class="nav-link" data-key="t-analytics"
                                    >
                                    View </a>
                            </li>
                        </ul>
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('members.create') }}" class="nav-link" data-key="t-analytics"
                                    >
                                    Create </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#guard" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="guard">
                        <i class="ri-user-5-line"></i> <span data-key="t-dashboards">Agent</span>
                    </a>
                    <div class="collapse menu-dropdown" id="guard">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('guard.index') }}" class="nav-link" data-key="t-analytics"
                                    >
                                    Veiw </a>
                            </li>
                        </ul>

                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('guard.create') }}" class="nav-link" data-key="t-analytics"
                                    >
                                    Create </a>
                            </li>
                        </ul>

                    </div>
                </li>

                <li class="menu-title"><span data-key="t-menu">Reports</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#Reports" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="Director">
                        <i class="ri-user-2-line"></i> <span data-key="t-dashboards">Reports</span>
                    </a>
                    <div class="collapse menu-dropdown" id="Reports">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('report.sale') }}" class="nav-link" data-key="t-analytics"
                                    >
                                    Sale </a>
                            </li>
                        </ul>

                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('report.renewal') }}" class="nav-link" data-key="t-analytics"
                                    >
                                    Renewal </a>
                            </li>
                        </ul>
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('report.commission') }}" class="nav-link" data-key="t-analytics"
                                    >
                                    Commission </a>
                            </li>
                        </ul>

                    </div>
                </li>




                {{-- @endif --}}
                <!-- End Admin Menu -->

            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>
<div class="vertical-overlay"></div>
