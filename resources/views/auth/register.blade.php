@extends('layouts.app')

@section('title', 'Register | Phim Mới')

@section('content')
<div class="flex items-center justify-center px-4 py-8 min-h-screen">    
    <div class="bg-white p-8 rounded-xl shadow-xl w-full max-w-md">
        <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Đăng ký tài khoản</h2>

        {{-- Hiển thị lỗi --}}
        @if ($errors->any())
        <div class="mb-4 text-sm text-red-600">
            {{ $errors->first() }}
        </div>
        @endif

        {{-- Form đăng ký --}}
        <form method="POST" action="{{ route('register') }}" class="space-y-5">
            @csrf

            <div>
                <label for="username" class="block text-sm font-medium text-gray-700 mb-1">Tên đăng nhập</label>
                <input type="username" name="text" id="username" value="{{ old('username') }}" required autofocus class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500 @error('username') border-red-500 @enderror">
                @error('username')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

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

            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Nhập lại mật khẩu</label>
                <input type="password" name="password_confirmation" id="password_confirmation" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500">
            </div>

            <button type="submit" class="w-full px-4 py-2 bg-green-500 text-white font-semibold rounded-lg hover:bg-green-600 transition-colors">
                Đăng ký
            </button>

            <div class="flex items-center my-4">
                <div class="flex-grow border-t border-gray-300"></div>
                <span class="mx-2 text-gray-500 text-sm">hoặc</span>
                <div class="flex-grow border-t border-gray-300"></div>
            </div>

            <div class="text-center text-sm text-gray-500 mt-4">
                <a href="{{ route('login') }}" class="text-green-600 hover:underline">Đăng nhập ngay</a>
            </div>
        </form>
    </div>
</div>
@endsection