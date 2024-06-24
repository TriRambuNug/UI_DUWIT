@extends('layout.base')

@section('title', 'Ubah Password')

@section('css')
@endsection

@section('content')

<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Akun Pengguna / Ubah Password /</span> Ubah Password</h4>

<div class="row">
    <div class="col-md-12">
        <div class="card mb-4">
            <h5 class="card-header">Ubah Password</h5>
            <!-- Change Password -->
            <div class="card-body">
            <form id="formChangePassword" method="POST" action="{{ route('profile.updatePassword', ['id' => $user['id']]) }}">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="mb-3 col-sm-6 col-md-6 col-xl-6">
                    <label for="current_password" class="form-label">Password Saat Ini</label>
                    <input class="form-control" type="password" id="current_password" name="current_password" required />
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col-sm-6 col-md-6 col-xl-6">
                    <label for="new_password" class="form-label">Password Baru</label>
                    <input class="form-control" type="password" id="new_password" name="new_password" required />
                </div>
                <div class="mb-3 col-sm-6 col-md-6 col-xl-6">
                    <label for="new_password_confirmation" class="form-label">Konfirmasi Password Baru</label>
                    <input class="form-control" type="password" id="new_password_confirmation" name="new_password_confirmation" required />
                </div>
            </div>
            @if (session('status'))
                <div class="alert alert-dark alert-dismissible" role="alert">
                    {{ session('status') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="mt-2">
                <div class="row">
                    <div class="col col-auto">
                        <a href="{{ route('profile.index') }}" class="btn btn-secondary me-2"> Kembali </a>
                    </div>
                    <div class="col col-auto">
                        <button type="submit" class="btn btn-primary me-2">Ubah Password</button>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('js_page')
@endsection
