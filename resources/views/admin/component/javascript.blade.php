<script src="{{ asset(config('app.asset_admin_path') . '/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset(config('app.asset_admin_path') . '/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset(config('app.asset_admin_path') . '/libs/sweetalert2/sweetalert2.min.js') }}"></script>
<script src="{{ asset(config('app.asset_admin_path') . '/libs/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ asset(config('app.asset_admin_path') . '/libs/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ asset(config('app.asset_admin_path') . '/libs/apexcharts/apexcharts.min.js') }}"></script>

<script src="https://apexcharts.com/samples/assets/stock-prices.js"></script>

<script src="{{ asset(config('app.asset_admin_path') . '/js/pages/index.init.js') }}"></script>
<script src="{{ asset(config('app.asset_admin_path') . '/js/app.js') }}"></script>
<script src="{{ asset(config('app.asset_admin_path') . '/js/pages/sweet-alert.init.js') }}"></script>

<!-- Custom Scripts -->
<script src="{{ asset(config('app.asset_admin_path') . '/js/toggle-theme.js') }}"></script>
<script src="{{ asset(config('app.asset_admin_path') . '/js/toggle-menu.js') }}"></script>

@stack('script')