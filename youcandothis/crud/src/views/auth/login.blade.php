@extends('layouts.auth')

@section('content')
<div class="login-wrap customscroll d-flex align-items-center flex-wrap justify-content-center pd-20">
        <div class="login-box bg-white box-shadow pd-30 border-radius-5">
            <img src="images/login-img.png" alt="login" class="login-img">
            <h2 class="text-center mb-30">Login</h2>
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
                    <div class="col-sm-6">
                        <div class="input-group">
                            <button type="submit" class="btn btn-outline-primary btn-lg btn-block">Login</button>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="forgot-password padding-top-10"><a href="#">Forgot Password</a></div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
