<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
        <div class="logo-header" data-background-color="dark">
            <a href="index.html" class="logo">
                <span class="fs-4 fw-bold text-white"><i class="bi bi-car-front me-3"></i>Safe Parking</span>
            </a>
            <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                    <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                    <i class="gg-menu-left"></i>
                </button>
            </div>
            <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
            </button>
        </div>
    </div>
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-secondary">
                <li class="nav-item">
                    <a href="/" class="nav-link">
                        <i class="bi bi-house-door"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#parkinglottoggle" class="nav-link" data-bs-toggle="collapse" aria-expanded="false" aria-controls="parkinglottoggle">
                        <i class="bi bi-p-circle"></i>
                        <p>Parking Lots</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="parkinglottoggle">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">
                                    <span class="sub-item">Add New Parking Lots</span>
                                </a>
                            </li>
                            <li>
                                <a href="/view-lots">
                                    <span class="sub-item">View Parking Lots</span>
                                </a>
                            </li>
                            <li>
                                <a href="widgets.html">
                                    <span class="sub-item">Delete Parking Lot</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="#parkingfeetoggle" class="nav-link" data-bs-toggle="collapse" aria-expanded="false" aria-controls="parkingfeetoggle">
                        <i class="bi bi-cash-stack"></i>
                        <p>Parking Finances</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="parkingfeetoggle">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="/view-charges">
                                    <span class="sub-item">View Parking Charges</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="#parkingClient" class="nav-link" data-bs-toggle="collapse" aria-expanded="false" aria-controls="parkingClient">
                        <i class="bi bi-cash-stack"></i>
                        <p>Clients</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="parkingClient">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="#table"  data-bs-toggle="modal" data-bs-target="#addclient">
                                    <span class="sub-item">Add Client</span>
                                </a>
                            </li>
                            <li>
                                <a href="/view-clients">
                                    <span class="sub-item">View Clients</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
