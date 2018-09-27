@extends('admin.layouts.auth')
@section('title','Login')
@section('content')
<div class="login-wrap customscroll d-flex align-items-center flex-wrap justify-content-center pd-20">
        <div class="login-box bg-white box-shadow pd-30 border-radius-5">
            <img src="images/login-img.png" alt="login" class="login-img">
            <h2 class="text-center mb-30">Login</h2>
            @if(Session::has('errors'))
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <p>These credentials do not match our records.</p>        
                </div>
            @endif
            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                <div class="input-group custom input-group-lg">
                    <input type="text" class="form-control" placeholder="Username" name="email" value="{{ old('email') }}" required autofocus>
                    <div class="input-group-append custom">
                        <span class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i></span>
                    </div>
                </div>
                <div class="input-group custom input-group-lg">
                    <input type="password" class="form-control" placeholder="**********" name="password" required>
                    <div class="input-group-append custom">
                        <span class="input-group-text"><i class="fa fa-lock" aria-hidden="true"></i></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="input-group">
                            <button type="submit" class="btn btn-outline-primary btn-lg btn-block">Login</button>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="input-group"><a href="{!! route('password.request') !!}" class="btn btn-outline-primary btn-lg btn-block">Forgot Password</a></div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
