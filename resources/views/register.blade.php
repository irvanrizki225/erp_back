@extends('layouts.auth')
@section('content')
<div class="px-30 py-10">
    <a class="link-effect font-w700" href="index.html">
        <i class="si si-fire"></i>
        <span class="font-size-xl text-primary-dark">code</span><span class="font-size-xl">base</span>
    </a>
    <h1 class="h3 font-w700 mt-30 mb-10">Create New Account</h1>
    <h2 class="h5 font-w400 text-muted mb-0">Please add your details</h2>
</div>
<!-- END Header -->

<!-- Sign Up Form -->
<!-- jQuery Validation functionality is initialized with .js-validation-signup class in js/pages/op_auth_signup.min.js which was auto compiled from _js/pages/op_auth_signup.js -->
<!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->

<form action="{{ route('register') }}" method="post">
    @csrf
    <div class="card-body">
        @if(session('errors'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Something it's wrong:
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
                </ul>
            </div>
        @endif
        <div class="form-group">
            <label for=""><strong>Nama Lengkap</strong></label>
            <input type="text" name="name" class="form-control" placeholder="Nama Lengkap">
        </div>
        <div class="form-group">
            <label for=""><strong>Email</strong></label>
            <input type="text" name="email" class="form-control" placeholder="Email">
        </div>
        <div class="form-group">
            <label for=""><strong>Password</strong></label>
            <input type="password" name="password" class="form-control" placeholder="Password">
        </div>
        <div class="form-group">
            <label for=""><strong>Konfirmasi Password</strong></label>
            <input type="password" name="password_confirmation" class="form-control" placeholder="Password">
            <input type="text" name="role" class="form-control" value="admin" readonly>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary btn-block">Register</button>
        <p class="text-center">Sudah punya akun? <a href="{{ route('masuk') }}">Login</a> sekarang!</p>
    </div>
    </form>
@endsection