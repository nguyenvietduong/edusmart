<div class="topbar d-print-none">
    <div class="container-fluid">
        <nav class="topbar-custom d-flex justify-content-between" id="topbar-custom">


            <ul class="topbar-item list-unstyled d-inline-flex align-items-center mb-0">
                @include('admin.component.toggle-menu')

                <li class="mx-2 welcome-text">
                    <a class=" btn btn-sm btn-soft-primary" href="#" role="button"><i
                            class="fas fa-plus me-2"></i>New Task</a>
                    <!-- <h5 class="mb-0 fw-semibold text-truncate">Good Morning, James!</h5> -->
                    <!-- <h6 class="mb-0 fw-normal text-muted text-truncate fs-14">Here's your overview this week.</h6> -->
                </li>
            </ul>
            <ul class="topbar-item list-unstyled d-inline-flex align-items-center mb-0">
                <li class="hide-phone app-search">
                    <form role="search" action="#" method="get">
                        <input type="search" name="search" class="form-control top-search mb-0"
                            placeholder="Search here...">
                        <button type="submit"><i class="iconoir-search"></i></button>
                    </form>
                </li>

                @include('admin.component.light-dark-toggle')

                @include('admin.component.notification')

                @if (Auth::check())
                    <li class="dropdown topbar-item">
                        <a class="nav-link dropdown-toggle arrow-none nav-icon" data-bs-toggle="dropdown" href="#"
                            role="button" aria-haspopup="false" aria-expanded="false" data-bs-offset="0,19">
                            <img src="{{ checkFile(Auth::user()->profile->photo ?? '') }}" alt="" class="thumb-md rounded-circle">
                        </a>
                        <div class="dropdown-menu dropdown-menu-end py-0">
                            <div class="d-flex align-items-center dropdown-item py-2 bg-secondary-subtle">
                                <div class="flex-shrink-0">
                                    <img src="{{ checkFile(Auth::user()->profile->photo ?? '') }}" alt=""
                                        class="thumb-md rounded-circle">
                                </div>
                                <div class="flex-grow-1 ms-2 text-truncate align-self-center">
                                    <h6 class="my-0 fw-medium text-dark fs-13">
                                        {{ Auth::user()->last_name . Auth::user()->first_name }}</h6>
                                    <small
                                        class="text-muted mb-0">{{ Auth::user()->role->name . ' | ' . Auth::user()->user_type_label }}</small>
                                </div><!--end media-body-->
                            </div>
                            <div class="dropdown-divider mt-0"></div>
                            <small class="text-muted px-2 pb-1 d-block">Account</small>
                            <a class="dropdown-item" href="pages-profile.html"><i
                                    class="las la-user fs-18 me-1 align-text-bottom"></i> {{ Auth::user()->email }}</a>
                            <a class="dropdown-item" href="pages-faq.html"><i
                                    class="las la-wallet fs-18 me-1 align-text-bottom"></i> {{ Auth::user()->profile->phone ?? '-' }}</a>
                            <small class="text-muted px-2 py-1 d-block">Settings</small>
                            <a class="dropdown-item" href="pages-profile.html"><i
                                    class="las la-cog fs-18 me-1 align-text-bottom"></i>Account Settings</a>
                            <a class="dropdown-item" href="pages-profile.html"><i
                                    class="las la-lock fs-18 me-1 align-text-bottom"></i> Security</a>
                            <a class="dropdown-item" href="pages-faq.html"><i
                                    class="las la-question-circle fs-18 me-1 align-text-bottom"></i> Help Center</a>
                            <div class="dropdown-divider mb-0"></div>
                            <form class="dropdown-item text-danger"
                                onclick="return executeExample('confirm', () => this.submit())"
                                action="{{ route('logout') }}" method="post">
                                @csrf
                                <i class="las la-power-off fs-18 me-1 align-text-bottom"></i>
                                Logout
                            </form>
                        </div>
                    </li>
                @endif
            </ul><!--end topbar-nav-->
        </nav>
        <!-- end navbar-->
    </div>
</div>
