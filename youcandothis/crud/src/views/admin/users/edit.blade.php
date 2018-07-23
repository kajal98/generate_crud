@extends('admin.layouts.panel')
@section('title','Edit User')
@section('content')
<div class="min-height-200px">
    <!-- Default Basic Forms Start -->
    <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
        <div class="clearfix">
            <div class="pull-left">
                <h4 class="text-blue">Edit User</h4>
                <p class="mb-30 font-14"></p>
            </div>
            <div class="pull-right">
                <a href="{!! route('users.index') !!}" class="btn btn-sm btn-primary btn-sm" rel="content-y"  role="button"><i class="fa fa-arrow-left"></i> Back</a>
            </div>
        </div>
           {!! Former::horizontal_open()->action( URL::route("users.update",$user->id) )->method('PATCH')->class('p-t-15')->role('form')->id('form') !!}
                       {{ csrf_field() }}

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Name</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="text" value="{!! $user->name !!}" name="name" placeholder="John Doe">
                    @if($errors->has('name'))<p class="help-block">{!! $errors->first('name') !!}</p>@endif
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Email</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="text" value="{!! $user->email !!}" name="email" placeholder="abc@gmail.com">
                    @if($errors->has('email'))<p class="help-block">{!! $errors->first('email') !!}</p>@endif
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Phone</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="text" value="{!! $user->phone !!}" name="phone" placeholder="+91 3322114455">
                    @if($errors->has('phone'))<p class="help-block">{!! $errors->first('phone') !!}</p>@endif
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Mobile</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="text" value="{!! $user->mobile !!}" name="mobile" placeholder="+91 3322114455">
                    @if($errors->has('mobile'))<p class="help-block">{!! $errors->first('mobile') !!}</p>@endif
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Address</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="text" value="{!! $user->address !!}" name="address" placeholder="Near Swami Hall">
                    @if($errors->has('address'))<p class="help-block">{!! $errors->first('address') !!}</p>@endif
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">City</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="text" value="{!! $user->city !!}" name="city" placeholder="Surat">
                    @if($errors->has('city'))<p class="help-block">{!! $errors->first('city') !!}</p>@endif
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">State</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="text" value="{!! $user->state !!}" name="state" placeholder="Gujarat">
                    @if($errors->has('state'))<p class="help-block">{!! $errors->first('state') !!}</p>@endif
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Country</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="text" value="{!! $user->country !!}" name="country" placeholder="India">
                    @if($errors->has('country'))<p class="help-block">{!! $errors->first('country') !!}</p>@endif
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-6 col-sm-12">
                    <div class="custom-control custom-checkbox mb-5">
                        <input class="form-control" type="hidden" name="active" value="0">
                        <input type="checkbox" class="custom-control-input" id="active" name="active" value="1" {!! $user->active == true ? "checked" : "" !!}>
                        <label class="custom-control-label" for="active">Click here to active/inactive this user</label>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-12 col-md-10">
                    <button type="submit" class="btn btn-outline-primary">Save!</button>
                </div>
            </div>
        {!! Former::close() !!}
    </div>
    <!-- Default Basic Forms End -->
</div>
@endsection