@extends('admin.layouts.auth')
@section('title','Register')
@section('content')
<div class="login-wrap customscroll d-flex align-items-center flex-wrap justify-content-center pd-20">
    <div class="login-box bg-white box-shadow pd-30 border-radius-5">
        <img src="images/login-img.png" alt="login" class="login-img">
        <h2 class="text-center mb-30">Register</h2>
        <form class="form-horizontal" method="POST" action="{{ route('register') }}">
            {{ csrf_field() }}
            <div class="input-group custom input-group-lg">
                <input type="text" class="form-control" placeholder="Name" name="name" value="{{ old('name') }}" required autofocus>
                <div class="input-group-append custom">
                    <span class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i></span>
                </div>
                @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
                @endif
            </div>
            <div class="input-group custom input-group-lg">
                <input type="text" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}" required autofocus>
                <div class="input-group-append custom">
                    <span class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i></span>
                </div>
                @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
            </div>
            <div class="input-group custom input-group-lg">
                <input id="password" type="password" class="form-control" placeholder="Password" name="password" required>
                <div class="input-group-append custom">
                    <span class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i></span>
                </div>
                @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
            </div>
            <div class="input-group custom input-group-lg">
                <input id="password-confirm" type="password" class="form-control" placeholder="Password" name="password_confirmation" required>
                <div class="input-group-append custom">
                    <span class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i></span>
                </div>
                @if ($errors->has('password_confirmation'))
                <span class="help-block">
                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                </span>
                @endif
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="input-group">
                        <button type="submit" class="btn btn-outline-primary btn-lg btn-block">Register</button>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="input-group"><a href="{!! route('login') !!}" class="btn btn-outline-primary btn-lg btn-block">Login</a></div>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
</div>
</div>
@endsection