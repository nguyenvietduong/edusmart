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
                <li class="nav-item">
                    <a class="nav-link" href="#sidebarAdvancedUI" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarAdvancedUI">
                        <i class="iconoir-peace-hand menu-icon"></i>
                        <span>Advanced UI</span><span
                            class="badge rounded text-success bg-success-subtle ms-1">New</span>
                    </a>
                    <div class="collapse " id="sidebarAdvancedUI">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="advanced-animation.html">Animation</a>
                            </li><!--end nav-item-->
                            <li class="nav-item">
                                <a class="nav-link" href="advanced-clipboard.html">Clip Board</a>
                            </li><!--end nav-item-->
                            <li class="nav-item">
                                <a class="nav-link" href="advanced-dragula.html">Dragula</a>
                            </li><!--end nav-item-->
                            <li class="nav-item">
                                <a class="nav-link" href="advanced-files.html">File Manager</a>
                            </li><!--end nav-item-->
                            <li class="nav-item">
                                <a class="nav-link" href="advanced-highlight.html">Highlight</a>
                            </li><!--end nav-item-->
                            <li class="nav-item">
                                <a class="nav-link" href="advanced-rangeslider.html">Range Slider</a>
                            </li><!--end nav-item-->
                            <li class="nav-item">
                                <a class="nav-link" href="advanced-ratings.html">Ratings</a>
                            </li><!--end nav-item-->
                            <li class="nav-item">
                                <a class="nav-link" href="advanced-ribbons.html">Ribbons</a>
                            </li><!--end nav-item-->
                            <li class="nav-item">
                                <a class="nav-link" href="advanced-sweetalerts.html">Sweet Alerts</a>
                            </li><!--end nav-item-->
                            <li class="nav-item">
                                <a class="nav-link" href="advanced-toasts.html">Toasts</a>
                            </li><!--end nav-item-->
                        </ul><!--end nav-->
                    </div><!--end startbarAdvancedUI-->
                </li><!--end nav-item-->
                <li class="nav-item">
                    <a class="nav-link" href="#sidebarForms" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarForms">
                        <i class="iconoir-cube-hole menu-icon"></i>
                        <span>Forms</span>
                    </a>
                    <div class="collapse " id="sidebarForms">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="forms-elements.html">Basic Elements</a>
                            </li><!--end nav-item-->
                            <li class="nav-item">
                                <a class="nav-link" href="forms-advanced.html">Advance Elements</a>
                            </li><!--end nav-item-->
                            <li class="nav-item">
                                <a class="nav-link" href="forms-validation.html">Validation</a>
                            </li><!--end nav-item-->
                            <li class="nav-item">
                                <a class="nav-link" href="forms-wizard.html">Wizard</a>
                            </li><!--end nav-item-->
                            <li class="nav-item">
                                <a class="nav-link" href="forms-editors.html">Editors</a>
                            </li><!--end nav-item-->
                            <li class="nav-item">
                                <a class="nav-link" href="forms-uploads.html">File Upload</a>
                            </li><!--end nav-item-->
                            <li class="nav-item">
                                <a class="nav-link" href="forms-img-crop.html">Image Crop</a>
                            </li><!--end nav-item-->
                        </ul><!--end nav-->
                    </div><!--end startbarForms-->
                </li><!--end nav-item-->
                <li class="nav-item">
                    <a class="nav-link" href="#sidebarCharts" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarCharts">
                        <i class="iconoir-candlestick-chart menu-icon"></i>
                        <span>Charts</span>
                    </a>
                    <div class="collapse " id="sidebarCharts">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="charts-apex.html">Apex</a>
                            </li><!--end nav-item-->
                            <li class="nav-item">
                                <a class="nav-link" href="charts-justgage.html">JustGage</a>
                            </li><!--end nav-item-->
                            <li class="nav-item">
                                <a class="nav-link" href="charts-chartjs.html">Chartjs</a>
                            </li><!--end nav-item-->
                            <li class="nav-item">
                                <a class="nav-link" href="charts-toast-ui.html">Toast</a>
                            </li><!--end nav-item-->
                        </ul><!--end nav-->
                    </div><!--end startbarCharts-->
                </li><!--end nav-item-->
                <li class="nav-item">
                    <a class="nav-link" href="#sidebarTables" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarTables">
                        <i class="iconoir-list menu-icon"></i>
                        <span>Tables</span>
                    </a>
                    <div class="collapse " id="sidebarTables">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="tables-basic.html">Basic</a>
                            </li><!--end nav-item-->
                            <li class="nav-item">
                                <a class="nav-link" href="tables-datatable.html">Datatables</a>
                            </li><!--end nav-item-->
                            <li class="nav-item">
                                <a class="nav-link" href="tables-editable.html">Editable</a>
                            </li><!--end nav-item-->
                        </ul><!--end nav-->
                    </div><!--end startbarTables-->
                </li><!--end nav-item-->
                <li class="nav-item">
                    <a class="nav-link" href="#sidebarIcons" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarIcons">
                        <i class="iconoir-fire-flame menu-icon"></i>
                        <span>Icons</span>
                    </a>
                    <div class="collapse " id="sidebarIcons">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="icons-fontawesome.html">Font Awesome</a>
                            </li><!--end nav-item-->
                            <li class="nav-item">
                                <a class="nav-link" href="icons-lineawesome.html">Line Awesome</a>
                            </li><!--end nav-item-->
                            <li class="nav-item">
                                <a class="nav-link" href="icons-icofont.html">Icofont</a>
                            </li><!--end nav-item-->
                            <li class="nav-item">
                                <a class="nav-link" href="icons-iconoir.html">Iconoir</a>
                            </li><!--end nav-item-->
                        </ul><!--end nav-->
                    </div><!--end startbarIcons-->
                </li><!--end nav-item-->
                <li class="nav-item">
                    <a class="nav-link" href="#sidebarMaps" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarMaps">
                        <i class="iconoir-map-pin menu-icon"></i>
                        <span>Maps</span>
                    </a>
                    <div class="collapse " id="sidebarMaps">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="maps-google.html">Google Maps</a>
                            </li><!--end nav-item-->
                            <li class="nav-item">
                                <a class="nav-link" href="maps-leaflet.html">Leaflet Maps</a>
                            </li><!--end nav-item-->
                            <li class="nav-item">
                                <a class="nav-link" href="maps-vector.html">Vector Maps</a>
                            </li><!--end nav-item-->
                        </ul><!--end nav-->
                    </div><!--end startbarMaps-->
                </li><!--end nav-item-->
                <li class="nav-item">
                    <a class="nav-link" href="#sidebarEmailTemplates" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarEmailTemplates">
                        <i class="iconoir-send-mail menu-icon"></i>
                        <span>Email Templates</span>
                    </a>
                    <div class="collapse " id="sidebarEmailTemplates">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="email-templates-basic.html">Basic Action Email</a>
                            </li><!--end nav-item-->
                            <li class="nav-item">
                                <a class="nav-link" href="email-templates-alert.html">Alert Email</a>
                            </li><!--end nav-item-->
                            <li class="nav-item">
                                <a class="nav-link" href="email-templates-billing.html">Billing Email</a>
                            </li><!--end nav-item-->
                        </ul><!--end nav-->
                    </div><!--end startbarEmailTemplates-->
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
