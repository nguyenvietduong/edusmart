<script src="{{ asset(config('app.asset_admin_path') . '/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset(config('app.asset_admin_path') . '/libs/simplebar/simplebar.min.js') }}"></script>

<script src="{{ asset(config('app.asset_admin_path') . '/libs/apexcharts/apexcharts.min.js') }}"></script>
<script src="https://apexcharts.com/samples/assets/stock-prices.js"></script>
<script src="{{ asset(config('app.asset_admin_path') . '/js/pages/index.init.js') }}"></script>
<script src="{{ asset(config('app.asset_admin_path') . '/js/app.js') }}"></script>
@stack('script')