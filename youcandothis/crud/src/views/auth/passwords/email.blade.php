@extends('admin.layouts.auth')
@section('content')
<div class="login-wrap customscroll d-flex align-items-center flex-wrap justify-content-center pd-20">
    <div class="login-box bg-white box-shadow pd-30 border-radius-5">
        <img src="{!! asset('/images/login-img.png') !!}" alt="login" class="login-img">
        <h2 class="text-center mb-30">Forgot Password</h2>
        <div class="panel-body">
            @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
            @endif
            <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                {{ csrf_field() }}
                <div class="input-group custom input-group-lg">
                    <input id="email" type="email" placeholder="Email" class="form-control" name="email" value="{{ old('email') }}" required>
                    <div class="input-group-append custom">
                        <span class="input-group-text"><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
                    </div>
                    @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="input-group">
                            <button type="submit" class="btn btn-outline-primary btn-lg btn-block">Send Link</button>
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
@endsection