@extends('layouts.auth')
@section('title','Sign In')
@section('content')
<div class="login_wrapper" style="color: #008898">
  <div class="animate form login_form">
    <section class="login_content">
      {!!Former::framework('Nude') !!}
      {!!Former::open()->method('post')->action( route('admin.login'))->role('form')->token() !!}
      <h3>Login</h3>
      <div>
        {!!  Former::text('login')->placeholder('Email')->id(false)->label(false)->class('form-control required') !!}
      </div>
      <div>
        {!!  Former::password('password')->placeholder('Password')->id(false)->label(false)->class('form-control required') !!}
      </div>
      <div>
        {!!  Former::submit('Sign In')->id(false)->label(false)->class('btn btn-default submit') !!}
      </div>
      <div class="clearfix"></div>
      <div class="separator">
        <div>
          <a href="{!! route('home') !!}"><h3><img src="{!! asset('/images/2.png') !!}"> eDoc 24x7 </h3></a>
          <p>©<?php echo date('Y'); ?> All Rights Reserved.</p>
        </div>
      </div>
      {!!Former::close()!!}
    </section>
  </div>
</div>
@endsection