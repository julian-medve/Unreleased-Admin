@extends('auth.base')

@section('css')
@endsection


@section('content')

<div class="auth-wrapper">
    <div class="auth-content">
        <div class="auth-bg">
            <span class="r"></span>
            <span class="r s"></span>
            <span class="r s"></span>
            <span class="r"></span>
        </div>
        <div class="card">
            <div class="card-body text-center">
                <div class="mb-4">
                    <i class="feather icon-mail auth-icon"></i>
                </div>
                <h3 class="mb-4">Reset Password</h3>
                <div class="input-group mb-3">
                    <input type="email" class="form-control" placeholder="Email">
                </div>
                <button class="btn btn-primary mb-4 shadow-2">Reset Password</button>
                <p class="mb-0 text-muted">Don’t have an account? <a href="/register">Signup</a></p>
            </div>
        </div>
    </div>
</div>

@endsection


@section('javascript')
@endsection
