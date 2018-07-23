@extends('admin.layouts.panel')
@section('title','Add User')
@section('content')
<div class="min-height-200px">
    <!-- Default Basic Forms Start -->
    <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
        <div class="clearfix">
            <div class="pull-left">
                <h4 class="text-blue">Add User</h4>
                <p class="mb-30 font-14"></p>
            </div>
            <div class="pull-right">
                <a href="{!! route('users.index') !!}" class="btn btn-sm btn-primary btn-sm" rel="content-y"  role="button"><i class="fa fa-arrow-left"></i> Back</a>
            </div>
        </div>
        <form role="form" action="/admin/users" role="form" method="post" class="login-form">
            {{ csrf_field() }}
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Name</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="text" name="name" placeholder="John Doe">
                    @if($errors->has('name'))<p class="help-block">{!! $errors->first('name') !!}</p>@endif
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Email</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="text" name="email" placeholder="abc@gmail.com">
                    @if($errors->has('email'))<p class="help-block">{!! $errors->first('email') !!}</p>@endif
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Password</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="password" name="password" placeholder="*********">
                    @if($errors->has('password'))<p class="help-block">{!! $errors->first('password') !!}</p>@endif
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Password Confirmation</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="password" name="password_confirmation" placeholder="*********">
                    @if($errors->has('password_confirmation'))<p class="help-block">{!! $errors->first('password_confirmation') !!}</p>@endif
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Phone</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="text" name="phone" placeholder="+91 3322114455">
                    @if($errors->has('phone'))<p class="help-block">{!! $errors->first('phone') !!}</p>@endif
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Mobile</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="text" name="mobile" placeholder="+91 3322114455">
                    @if($errors->has('mobile'))<p class="help-block">{!! $errors->first('mobile') !!}</p>@endif
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Address</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="text" name="address" placeholder="Near Swami Hall">
                    @if($errors->has('address'))<p class="help-block">{!! $errors->first('address') !!}</p>@endif
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">City</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="text" name="city" placeholder="Surat">
                    @if($errors->has('city'))<p class="help-block">{!! $errors->first('city') !!}</p>@endif
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">State</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="text" name="state" placeholder="Gujarat">
                    @if($errors->has('state'))<p class="help-block">{!! $errors->first('state') !!}</p>@endif
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Country</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="text" name="country" placeholder="India">
                    @if($errors->has('country'))<p class="help-block">{!! $errors->first('country') !!}</p>@endif
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-6 col-sm-12">
                    <div class="custom-control custom-checkbox mb-5">
                        <input class="form-control" type="hidden" name="active" value="0">
                        <input type="checkbox" class="custom-control-input" id="active" name="active" value="1">
                        <label class="custom-control-label" for="active">Click here to active/inactive this user</label>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-12 col-md-10">
                    <button type="submit" class="btn btn-outline-primary">Save!</button>
                </div>
            </div>
        </form>
    </div>
    <!-- Default Basic Forms End -->
</div>
@endsection