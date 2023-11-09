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
                <img src="{{ config('app.url') }}assets/images/ganpati-logo.png" alt="" height="35">
            </span>
            <span class="logo-lg">
                <img src="{{ config('app.url') }}assets/images/ganpati-logo.png" alt="" height="70">
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
                        <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards" style="font-size: 18px">Dashboards</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarDashboards">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="dashboard-analytics.html" class="nav-link" data-key="t-analytics" style="font-size: 15px;">
                                    Analytics </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <!-- End Dashboard Menu -->

                <!-- Admin Menu -->

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarAdmins" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarAdmins">
                        <i class="ri-team-fill"></i> <span data-key="t-dashboards" style="font-size: 18px">Admin</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarAdmins">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="dashboard-analytics.html" class="nav-link" data-key="t-analytics" style="font-size: 15px;">
                                    Members </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <!-- End Admin Menu -->

            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>
<div class="vertical-overlay"></div>
