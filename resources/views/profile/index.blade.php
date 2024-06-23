@extends('layout.base')

@section('title', 'Detail Akun')

@section('css')
@endsection

@section('content')

<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Akun Pengguna / Daftar /</span> Detail</h4>

<div class="row">
    <div class="col-md-12">
        <div class="card mb-4">
            <h5 class="card-header">Akun Details</h5>
            <!-- Account -->
            <div class="card-body">
            <form id="formAccountSettings" method="POST" action="{{ route('profile.update', ['id' => $user['id']]) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="d-flex align-items-start align-items-sm-center gap-4">
                    <img src="#" alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar" />
                    <div class="button-wrapper">
                        <div class="row">
                            <div class="mb-3 col-md-6 col-xl-12">
                                <label for="fullname" class="form-label">Nama Pengguna</label>
                                <input class="form-control" type="text" id="fullname" name="fullname" value="{{ $user['fullname'] }}" autofocus />
                            </div>
                            <div class="mb-3 col-md-6 col-xl-12">
                                <label for="phone" class="form-label">Nomor Telepon</label>
                                <input class="form-control" type="text" id="phone" name="phone" value="{{ $user['phone'] }}" autofocus />
                            </div>
                        </div>
                    </div>
                    <div class="button-wrapper">
                        <div class="row">
                            <div class="mb-3 col-md-6 col-xl-12">
                                <label for="account_code" class="form-label">Kode Akun</label>
                                <input class="form-control" type="text" id="account_code" name="account_code" value="{{ $user['account_code'] }}" autofocus readonly />
                            </div>
                            <div class="mb-3 col-md-6 col-xl-12">
                                <label for="email" class="form-label">Email</label>
                                <input class="form-control-plaintext" type="text" id="email" name="email" value="{{ $user['email'] }}" autofocus/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="my-0" />
            <div class="card-body">
                    <div class="row">
                        <div class="mb-3 col-sm-6 col-md-6 col-xl-6">
                            <label for="type" class="form-label">Tipe Akun</label>
                            <input class="form-control" type="text" id="type" name="type" value="{{ $user['type'] }}" autofocus readonly />
                        </div>
                        <div class="mb-3 col-sm-6 col-md-6 col-xl-6">
                            <label for="role" class="form-label">Peran</label>
                            <input class="form-control" type="text" id="role" name="role" value="{{ $user['role'] }}" autofocus readonly />
                        </div>
                        <div class="mb-3 col-sm-6 col-md-4 col-xl-4">
                            <label for="pin" class="form-label">PIN</label>
                            <input class="form-control" type="text" id="pin" name="pin" value="{{ $user['pin'] }}" autofocus />
                        </div>
                        <div class="mb-3 col-sm-6 col-md-6 col-xl-6">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" id="status" aria-label="Default select example" name="status">
                                @php
                                    $status = $user['status'];
                                    if ($status == 'active') {
                                        echo "<option value='active' selected>active</option>";
                                        echo "<option value='blocked'>blocked</option>";
                                    } else {
                                        echo "<option value='blocked' selected>blocked</option>";
                                        echo "<option value='active'>active</option>";
                                    }
                                @endphp
                            </select>
                        </div>
                    </div>

                    <!-- <div class="row">
                        <div class="mb-3 col-sm-6 col-md-6 col-xl-6">
                            <label for="password" class="form-label">Password Baru</label>
                            <input class="form-control" type="password" id="password" name="password" autofocus />
                        </div>
                        <div class="mb-3 col-sm-6 col-md-6 col-xl-6">
                            <label for="password_confirmation" class="form-label">Konfirmasi Password Baru</label>
                            <input class="form-control" type="password" id="password_confirmation" name="password_confirmation" autofocus />
                        </div>
                    </div> -->
                    @if (session('status'))
                        <div class="alert alert-dark alert-dismissible" role="alert">
                            {{ session('status') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="mt-2">
                        <div class="row">
                            <div class="col col-auto">
                                <a href="{{ route('dashboard') }}" class="btn btn-secondary me-2"> Kembali </a>
                            </div>
                            <div class="col col-auto">
                                <button type="submit" class="btn btn-primary me-2">Simpan Perubahan</button>
                            </div>
                        </div>
                    </div>
            </div>
            <!-- /Account -->
            </form>
        </div>
    </div>
</div>

@endsection

@section('js_page')
@endsection
