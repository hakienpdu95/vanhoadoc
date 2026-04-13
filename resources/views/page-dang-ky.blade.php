@extends('layouts.app')

@section('title', 'Đăng ký tài khoản thành viên - ' . get_bloginfo('name'))

@section('content')
    <div class="min-h-screen bg-gray-50 py-12">
        <div class="max-w-lg mx-auto px-4">
            <div class="bg-white rounded-3xl shadow-xl p-8 md:p-12">
                <div class="text-center mb-10">
                    <h1 class="text-4xl font-bold">Đăng ký thành viên</h1>
                    <p class="mt-3 text-gray-600">Tham gia ngay để nhận nhiều ưu đãi</p>
                </div>

                {{-- Form bạn đã có --}}
                @include('partials.auth.register-form')
            </div>

            <div class="text-center mt-8 text-sm text-gray-500">
                Đã có tài khoản? 
                <a href="{{ home_url('/dang-nhap') }}" class="text-blue-600 hover:underline">Đăng nhập tại đây</a>
            </div>
        </div>
    </div>
@endsection