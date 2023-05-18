@extends('layouts.auth')

@section('title', 'Masuk')

@section('content')
<div class="col-12 col-md-9 col-xl-7 col-xxxl-5 px-8 px-sm-0 pt-64 pb-48">
    <div class="d-flex align-items-center mb-sm-24">
        <!-- <a href="" class="auth-back me-16">
            <i class="iconly-Light-ArrowLeft"></i>
        </a> -->
        <h1 class="mb-0">Login</h1>
    </div>
    <p class="mt-sm-8 mt-sm-0 text-black-60">Selamat Datang, silahkan masuk menggunakan akun Anda</p>

    <form class="mt-16 mt-sm-32 mb-8" method="POST" action="{{ route('login') }}">
        @csrf
        @error('email')
        <div class="alert alert-danger" role="alert">
            Email dan Password anda tidak valid
        </div>
        @enderror

        <div class="mb-16">
            <label class="form-label">Email :</label>
            <input type="email" class="form-control" name="email" value="{{ old('email') }}" required>
        </div>

        <div class="mb-16">
            <label class="form-label">Password :</label>
            <input type="password" class="form-control"  name="password" required>
        </div>

        <div class="row align-items-center justify-content-between mb-16">
            <div class="col hp-flex-none w-auto">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input"name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label ps-4" for="exampleCheck1">Simpan Kata Sandi</label>
                </div>
            </div>

            <div class="col hp-flex-none w-auto">
                <a class="hp-button text-black-80 hp-text-color-dark-40" href="{{route('password.request')}}">Lupa Password?</a>
            </div>
        </div>

        <button type="submit" class="btn btn-primary w-100">
            <a class="d-block w-100" style="color: inherit;">Masuk</a>
        </button>
    </form>
    <!-- <div class="col-12 hp-form-info mt-24">
        <span class="text-black-80 hp-text-color-dark-40 me-4">Belum Punya Akun?</span>
        <a class="text-primary-1 hp-text-color-dark-primary-2" href="{{ route('register') }}">Daftar</a>
    </div> -->
</div>
@endsection