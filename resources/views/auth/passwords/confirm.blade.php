@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5">
        <form method="POST" action="{{ route('password.confirm') }}" class="bg-white shadow-sm p-5 rounded">
            @csrf

            <div class="text-center mb-4">
                <img src="https://cdn-icons-png.flaticon.com/512/3064/3064197.png" alt="Password Confirm Icon" class="img-fluid" style="max-width: 80px;">
            </div>

            <h3 class="text-center text-dark fw-bold mb-3">Xác nhận mật khẩu</h3>
            <p class="text-muted text-center mb-4">Vui lòng nhập lại mật khẩu của bạn trước khi tiếp tục.</p>

            <div class="mb-3">
                <label for="password" class="form-label">Mật khẩu</label>
                <input id="password" type="password"
                       class="form-control @error('password') is-invalid @enderror"
                       name="password" required autocomplete="current-password" placeholder="••••••••">
                @error('password')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-grid gap-2 mt-4">
                <button type="submit" class="btn btn-primary">
                    Xác nhận mật khẩu
                </button>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="btn btn-link text-decoration-none">
                        Quên mật khẩu?
                    </a>
                @endif
            </div>
        </form>
    </div>
</div>
@endsection