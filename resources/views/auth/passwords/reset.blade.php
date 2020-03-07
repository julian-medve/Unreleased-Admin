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
             <h5 class="mb-4">Password</h5>
             <div class="input-group mb-3">
                <input type="password" class="form-control" placeholder="Current Password">
             </div>                  
             <div class="input-group mb-3">
                <input type="password" class="form-control" placeholder="New Password">
             </div>
             <div class="input-group mb-4">
                <input type="password" class="form-control" placeholder="Re-Type New Password">
             </div>
             <button class="btn btn-primary shadow-2 mb-4">Change Password</button>
             <p class="mb-0 text-muted">Don’t have an account? <a href="/register"> Signup</a></p>
          </div>
       </div>
    </div>
 </div>

@endsection


@section('javascript')
@endsection
