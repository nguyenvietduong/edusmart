@extends('layouts.app')

@section('title', 'Login | Phim Mới')

@section('content')
<div class="flex items-center justify-center px-4 py-8 min-h-screen">
    <div class="bg-white p-8 rounded-xl shadow-xl w-full max-w-md">
        <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Đăng nhập vào tài khoản</h2>

        {{-- Hiển thị lỗi --}}
        @if ($errors->any())
        <div class="mb-4 text-sm text-red-600">
            {{ $errors->first() }}
        </div>
        @endif

        {{-- Form đăng nhập --}}
        <form method="POST" action="{{ route('login') }}" class="space-y-5">
            @csrf

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500 @error('email') border-red-500 @enderror">
                @error('email')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Mật khẩu</label>
                <input type="password" name="password" id="password" required class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500 @error('password') border-red-500 @enderror">
                @error('password')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center">
                <input type="checkbox" name="remember" id="remember" class="mr-2">
                <label for="remember" class="text-sm text-gray-700">Ghi nhớ đăng nhập</label>
            </div>

            <button type="submit" class="w-full px-4 py-2 bg-green-500 text-white font-semibold rounded-lg hover:bg-green-600 transition-colors">
                Đăng nhập
            </button>

            <div class="flex items-center my-4">
                <div class="flex-grow border-t border-gray-300"></div>
                <span class="mx-2 text-gray-500 text-sm">hoặc</span>
                <div class="flex-grow border-t border-gray-300"></div>
            </div>

            {{-- Đăng nhập bằng Google và Facebook --}}
            <div class="flex flex-col gap-3">
                <a href="" class="w-full flex items-center justify-center gap-3 px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-100 transition-colors">
                    <iconify-icon icon="logos:google-icon" class="w-5 h-5"></iconify-icon>
                    <span class="text-sm font-medium text-gray-700">Đăng nhập bằng Google</span>
                </a>

                <a href="" class="w-full flex items-center justify-center gap-3 px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-100 transition-colors">
                    <iconify-icon icon="logos:facebook" class="w-5 h-5"></iconify-icon>
                    <span class="text-sm font-medium text-gray-700">Đăng nhập bằng Facebook</span>
                </a>
            </div>

            <div class="text-center text-sm text-gray-500 mt-4">
                <a href="{{ route('password.request') }}" class="text-green-600 hover:underline">Quên mật khẩu?</a>
            </div>

            <div class="text-center text-sm text-gray-500 mt-2">
                Chưa có tài khoản?
                <a href="{{ route('register') }}" class="text-green-600 hover:underline">Đăng ký ngay</a>
            </div>
        </form>
    </div>
</div>
@endsection