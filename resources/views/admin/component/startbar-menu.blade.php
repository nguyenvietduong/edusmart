<div class="startbar-menu">
    <div class="startbar-collapse" id="startbarCollapse" data-simplebar>
        <div class="d-flex align-items-start flex-column w-100">
            <!-- Navigation -->
            <ul class="navbar-nav mb-auto w-100">
                <li class="menu-label mt-2">
                    <span>Danh mục</span>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.dashboard') }}">
                        <i class="iconoir-paste-clipboard menu-icon"></i>
                        <span>Dashboard</span>
                    </a>
                </li><!--end nav-item-->

                <li class="menu-label mt-2">
                    <span>Hệ thống</span>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#sidebarSchools" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarSchools">
                        <i class="iconoir-community menu-icon"></i>
                        <span>Trường học</span>
                    </a>
                    <div class="collapse" id="sidebarSchools">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.school') }}">Thông tin trường học</a>
                            </li><!--end nav-item-->
                            <li class="nav-item">
                                <a class="nav-link" href="">Năm học</a>
                            </li><!--end nav-item-->
                        </ul><!--end nav-->
                    </div>
                </li><!--end nav-item-->

                <li class="nav-item">
                    <a class="nav-link" href="#sidebarUsers" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarUsers">
                        <i class="iconoir-community menu-icon"></i>
                        <span>Người dùng</span>
                    </a>
                    <div class="collapse" id="sidebarUsers">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.account.student') }}">Học sinh</a>
                            </li><!--end nav-item-->
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.account.teacher') }}">Giáo viên</a>
                            </li><!--end nav-item-->
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.account.activity-log') }}">Nhật ký hoạt
                                    động</a>
                            </li><!--end nav-item-->
                        </ul><!--end nav-->
                    </div>
                </li><!--end nav-item-->

                <li class="nav-item">
                    <a class="nav-link" href="#sidebarProjects" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarProjects">
                        <i class="iconoir-asana menu-icon"></i>
                        <span>Projects</span>
                    </a>
                    <div class="collapse " id="sidebarProjects">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a href="projects-overview.html" class="nav-link ">Overview</a>
                            </li><!--end nav-item-->
                            <li class="nav-item">
                                <a href="projects-projects.html" class="nav-link ">Projects</a>
                            </li><!--end nav-item-->
                            <li class="nav-item">
                                <a href="projects-board.html" class="nav-link ">Board</a>
                            </li><!--end nav-item-->
                            <li class="nav-item">
                                <a href="projects-teams.html" class="nav-link ">Teams</a>
                            </li><!--end nav-item-->
                            <li class="nav-item">
                                <a href="projects-files.html" class="nav-link ">Files</a>
                            </li><!--end nav-item-->
                            <li class="nav-item">
                                <a href="projects-create-project.html" class="nav-link ">Create Project</a>
                            </li><!--end nav-item-->
                        </ul><!--end nav-->
                    </div>
                </li><!--end nav-item-->
                <li class="nav-item">
                    <a class="nav-link" href="#sidebarAnalytics" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarAnalytics">
                        <i class="iconoir-reports menu-icon"></i>
                        <span>Analytics</span>
                    </a>
                    <div class="collapse " id="sidebarAnalytics">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a href="analytics-customers.html" class="nav-link ">Customers</a>
                            </li><!--end nav-item-->
                            <li class="nav-item">
                                <a href="analytics-reports.html" class="nav-link ">Reports</a>
                            </li><!--end nav-item-->
                        </ul><!--end nav-->
                    </div>
                </li><!--end nav-item-->
                <li class="nav-item">
                    <a class="nav-link" href="apps-chat.html">
                        <i class="iconoir-chat-bubble menu-icon"></i>
                        <span>Chat</span>
                    </a>
                </li><!--end nav-item-->
                <li class="nav-item">
                    <a class="nav-link" href="apps-contact-list.html">
                        <i class="iconoir-community menu-icon"></i>
                        <span>Contact List</span>
                    </a>
                </li><!--end nav-item-->
                <li class="nav-item">
                    <a class="nav-link" href="apps-calendar.html">
                        <i class="iconoir-calendar menu-icon"></i>
                        <span>Calendar</span>
                    </a>
                </li><!--end nav-item-->
                <li class="nav-item">
                    <a class="nav-link" href="apps-invoice.html">
                        <i class="iconoir-paste-clipboard menu-icon"></i>
                        <span>Invoice</span>
                    </a>
                </li><!--end nav-item-->

                <li class="menu-label mt-2">
                    <small class="label-border">
                        <div class="border_left hidden-xs"></div>
                        <div class="border_right"></div>
                    </small>
                    <span>Components</span>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#sidebarElements" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarElements">
                        <i class="iconoir-compact-disc menu-icon"></i>
                        <span>UI Elements</span>
                    </a>
                    <div class="collapse " id="sidebarElements">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="ui-alerts.html">Alerts</a>
                            </li><!--end nav-item-->
                            <li class="nav-item">
                                <a class="nav-link" href="ui-avatar.html">Avatar</a>
                            </li><!--end nav-item-->
                            <li class="nav-item">
                                <a class="nav-link" href="ui-buttons.html">Buttons</a>
                            </li><!--end nav-item-->
                            <li class="nav-item">
                                <a class="nav-link" href="ui-badges.html">Badges</a>
                            </li><!--end nav-item-->
                            <li class="nav-item">
                                <a class="nav-link" href="ui-cards.html">Cards</a>
                            </li><!--end nav-item-->
                            <li class="nav-item">
                                <a class="nav-link" href="ui-carousels.html">Carousels</a>
                            </li><!--end nav-item-->
                            <li class="nav-item">
                                <a class="nav-link" href="ui-dropdowns.html">Dropdowns</a>
                            </li><!--end nav-item-->
                            <li class="nav-item">
                                <a class="nav-link" href="ui-grids.html">Grids</a>
                            </li><!--end nav-item-->
                            <li class="nav-item">
                                <a class="nav-link" href="ui-images.html">Images</a>
                            </li><!--end nav-item-->
                            <li class="nav-item">
                                <a class="nav-link" href="ui-list.html">List</a>
                            </li><!--end nav-item-->
                            <li class="nav-item">
                                <a class="nav-link" href="ui-modals.html">Modals</a>
                            </li><!--end nav-item-->
                            <li class="nav-item">
                                <a class="nav-link" href="ui-navs.html">Navs</a>
                            </li><!--end nav-item-->
                            <li class="nav-item">
                                <a class="nav-link" href="ui-navbar.html">Navbar</a>
                            </li><!--end nav-item-->
                            <li class="nav-item">
                                <a class="nav-link" href="ui-offcanvas.html">Offcanvas</a>
                            </li><!--end nav-item-->
                            <li class="nav-item">
                                <a class="nav-link" href="ui-paginations.html">Paginations</a>
                            </li><!--end nav-item-->
                            <li class="nav-item">
                                <a class="nav-link" href="ui-popover-tooltips.html">Popover & Tooltips</a>
                            </li><!--end nav-item-->
                            <li class="nav-item">
                                <a class="nav-link" href="ui-progress.html">Progress</a>
                            </li><!--end nav-item-->
                            <li class="nav-item">
                                <a class="nav-link" href="ui-spinners.html">Spinners</a>
                            </li><!--end nav-item-->
                            <li class="nav-item">
                                <a class="nav-link" href="ui-tabs-accordions.html">Tabs & Accordions</a>
                            </li><!--end nav-item-->
                            <li class="nav-item">
                                <a class="nav-link" href="ui-typography.html">Typography</a>
                            </li><!--end nav-item-->
                            <li class="nav-item">
                                <a class="nav-link" href="ui-videos.html">Videos</a>
                            </li><!--end nav-item-->
                        </ul><!--end nav-->
                    </div><!--end startbarElements-->
                </li><!--end nav-item-->

                <li class="menu-label mt-2">
                    <small class="label-border">
                        <div class="border_left hidden-xs"></div>
                        <div class="border_right"></div>
                    </small>
                    <span>Cấu Hình</span>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#sidebarPages" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarPages">
                        <i class="fab fa-accessible-icon menu-icon"></i>
                        <span>Công Việc</span>
                    </a>
                    <div class="collapse " id="sidebarPages">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.config.job.location') }}">Khu vực hành
                                    chính</a>
                            </li><!--end nav-item-->
                        </ul><!--end nav-->
                    </div><!--end startbarPages-->
                </li><!--end nav-item-->
            </ul><!--end navbar-nav--->
        </div>
    </div><!--end startbar-collapse-->
</div>
