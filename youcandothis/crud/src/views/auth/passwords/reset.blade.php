@extends('admin.layouts.auth')
@section('content')
<div class="login-wrap customscroll d-flex align-items-center flex-wrap justify-content-center pd-20">
    <div class="login-box bg-white box-shadow pd-30 border-radius-5">
        <img src="{!! asset('/images/login-img.png') !!}" alt="login" class="login-img">
        <h2 class="text-center mb-30">Reset Password</h2>
        <div class="panel-body">
            <form class="form-horizontal" method="POST" action="{{ route('password.request') }}">
                {{ csrf_field() }}
                <input type="hidden" name="token" value="{{ $token }}">
                <div class="input-group custom input-group-lg">
                    <input id="email" type="email"  placeholder="Email" class="form-control" name="email" value="{{ $email or old('email') }}" required autofocus>
                    <div class="input-group-append custom">
                        <span class="input-group-text"><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
                    </div>
                    @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="input-group custom input-group-lg">
                    <input id="password" type="password"  placeholder="**********" class="form-control" name="password" required>
                    <div class="input-group-append custom">
                        <span class="input-group-text"><i class="fa fa-key" aria-hidden="true"></i></span>
                    </div>
                    @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="input-group custom input-group-lg">
                    <input id="password-confirm" type="password"  placeholder="**********" class="form-control" name="password_confirmation" required>
                    <div class="input-group-append custom">
                        <span class="input-group-text"><i class="fa fa-key" aria-hidden="true"></i></span>
                    </div>
                    @if ($errors->has('password_confirmation'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="input-group">
                            <button type="submit" class="btn btn-outline-primary btn-lg btn-block">Reset Password</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection