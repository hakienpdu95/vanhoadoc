@extends('layouts.app')

@section('title', 'Kích hoạt tài khoản - ' . get_bloginfo('name'))

@section('content')
    <div class="min-h-screen bg-gray-50 flex items-center justify-center py-12 px-4">
        <div class="max-w-md w-full bg-white rounded-3xl shadow-xl p-10 text-center">

            @if (request()->get('success'))
                <div class="mx-auto w-16 h-16 bg-green-100 text-green-600 rounded-2xl flex items-center justify-center mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 10l7-7m0 0l7 7" />
                    </svg>
                </div>
                <h1 class="text-3xl font-bold text-gray-900 mb-3">Kích hoạt thành công!</h1>
                <p class="text-gray-600 mb-8">Tài khoản của bạn đã được kích hoạt.<br>Bạn có thể đăng nhập ngay bây giờ.</p>
                <a href="{{ home_url('/dang-nhap') }}" 
                   class="inline-block bg-blue-600 text-white font-medium px-10 py-4 rounded-2xl transition">
                    Đăng nhập ngay
                </a>

            @elseif (request()->get('error') === 'expired')
                <h1 class="text-3xl font-bold text-red-600 mb-3">Link đã hết hạn</h1>
                <p class="text-gray-600 mb-6">Vui lòng yêu cầu gửi lại link kích hoạt.</p>
                <a href="{{ home_url('/dang-nhap') }}" class="text-blue-600 hover:underline">Quay về trang đăng nhập</a>

            @else
                <h1 class="text-3xl font-bold text-red-600 mb-3">Link không hợp lệ</h1>
                <p class="text-gray-600 mb-6">Link kích hoạt không đúng hoặc đã sử dụng.<br>Vui lòng thử lại hoặc gửi link mới.</p>
                <a href="{{ home_url('/dang-nhap') }}" class="text-blue-600 hover:underline">Quay về trang đăng nhập</a>
            @endif

        </div>
    </div>
@endsection