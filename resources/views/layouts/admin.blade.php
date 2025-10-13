<!DOCTYPE html>
<html lang="en" dir="ltr" data-startbar="light" data-bs-theme="{{ session('theme', 'light') }}">

<head>
    @include('admin.component.head')
</head>

<body data-sidebar-size="default">

    <!-- Top Bar Start -->
    @include('admin.component.topbar')
    <!-- Top Bar End -->

    <!-- leftbar-tab-menu -->
    <div class="startbar d-print-none">
        <!--start brand-->
        @include('admin.component.logo')
        <!--end brand-->

        <!--start startbar-menu-->
        @include('admin.component.startbar-menu')
        <!--end startbar-menu-->
    </div>
    <!--end startbar-->

    <div class="startbar-overlay d-print-none"></div>
    <!-- end leftbar-tab-menu-->

    <div class="page-wrapper">

        <!-- Page Content-->
        <div class="page-content">
            @yield('adminContent')

            <!--Start Footer-->
            @include('admin.component.footer')
            <!--end footer-->
        </div>
        <!-- end page content -->
    </div>
    <!-- end page-wrapper -->

    <!-- Javascript  -->
    <!-- vendor js -->

    @include('admin.component.javascript')
</body>
<!--end body-->

</html>
