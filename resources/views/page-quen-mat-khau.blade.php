@extends('layouts.app')

@section('title', 'Quên mật khẩu - ' . get_bloginfo('name'))

@section('content')
    <div class="min-h-screen bg-gray-50 py-12">
        <div class="max-w-lg mx-auto px-4">
            <div class="bg-white rounded-3xl shadow-xl p-8 md:p-12">
                <div class="text-center mb-8">
                    <h1 class="text-4xl font-bold text-gray-900">
                        @if (request()->get('action') === 'reset')
                            Đặt lại mật khẩu
                        @else
                            Quên mật khẩu?
                        @endif
                    </h1>
                    <p class="mt-3 text-gray-600">
                        @if (request()->get('action') === 'reset')
                            Nhập mật khẩu mới cho tài khoản của bạn
                        @else
                            Nhập email để nhận link đặt lại mật khẩu
                        @endif
                    </p>
                </div>

                @if (request()->get('action') === 'reset' && request()->get('key') && request()->get('login'))
                    @include('partials.auth.reset-password-form')
                @else
                    @include('partials.auth.forgot-form')
                @endif
            </div>
        </div>
    </div>
@endsection