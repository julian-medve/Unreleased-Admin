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
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="mb-4">
                        <i class="feather icon-user-plus auth-icon"></i>
                    </div>
                    <h3 class="mb-4">Sign up</h3>
                    <div class="input-group mb-3">
                        <input type="text" name="name" class="form-control" placeholder="Username" required>
                    </div>
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Email" required>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="password" required>
                    </div>

                    <div class="input-group mb-4">
                        <select class="form-control" name="role" id="role" required>    
                    
                            <option value>Select User Role ...</option>

                            @foreach ($userrole as $item)
                                <option value="{{ $item }}">{{ $item }}</option>
                            @endforeach

                        </select>
                    </div>

                    <div class="form-group text-left">
                        <div class="checkbox checkbox-fill d-inline">
                            <input type="checkbox" name="checkbox-fill-2" id="checkbox-fill-2">
                            <label for="checkbox-fill-2" class="cr">Send me the <a href="#!"> Newsletter</a> weekly.</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary shadow-2 mb-4">Sign up</button>
                    <p class="mb-0 text-muted">Allready have an account? <a href="{{ route('login') }}"> Log in</a></p>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection


@section('javascript')
@endsection
