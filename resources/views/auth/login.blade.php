<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

{{-- Header --}}
@extends('layout.header')
{{-- END Header --}}

@section('title', 'Login')

@section('css_page')
<link rel="stylesheet" href="{{ asset('theme_assets/assets/vendor/css/pages/page-auth.css')}}" />
@endsection

<body>
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <!-- Register -->
                <div class="card">
                    <div class="card-body">
                        <!-- Logo -->
                        <div class="app-brand justify-content-center">
                            <a href="index.html" class="app-brand-link gap-2">
                                <span class="app-brand-logo demo">
                                    <!-- SVG Logo here -->
                                </span>
                                <span class="app-brand-text demo text-body fw-bolder">Sneat</span>
                            </a>
                        </div>
                        <!-- /Logo -->
                        <h4 class="mb-2">Selamat datang di DUWIT 👋</h4>
                        <p class="mb-4">Silakan masuk ke akun Anda.</p>

                        <form id="loginForm" class="mb-3" action="{{ route('auth.handleLogin') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="phone" class="form-label">Nomor telepon</label>
                                <input type="text" class="form-control" name="phone" placeholder="contoh: 08xxxxxxxxxx" autofocus />
                                <div id="phoneError" class="form-text text-danger">
                                    {{ $errors->first('phone') }}
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" />
                                <div id="passwordError" class="form-text text-danger">
                                    {{ $errors->first('password') }}
                                </div>
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary d-grid w-100" type="submit">Masuk</button>
                            @if ($errors->has('loginError'))
                                <div class="text-danger">{{ $errors->first('loginError') }}</div>
                            @endif
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /Register -->
            </div>
        </div>
    </div>

    {{-- JS --}}
    @extends('layout.js')
    {{-- END JS --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var loginError = "{{ $errors->first('loginError') }}";
            if (loginError) {
                alert('Your account is not allowed to log in due to your role.');
            }
        });
    </script>
</body>
</html>
