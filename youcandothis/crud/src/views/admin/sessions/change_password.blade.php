@extends('admin.layouts.panel')
@section('title','Add User')
@section('content')
<div class="min-height-200px">
    <!-- Default Basic Forms Start -->
    <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
        <div class="clearfix">
            <div class="pull-left">
                <h4 class="text-blue">Change Password</h4>
                <p class="mb-30 font-14"></p>
            </div>
            <div class="pull-right">
                <a href="{!! route('admin-dashboard') !!}" class="btn btn-sm btn-primary btn-sm" rel="content-y"  role="button"><i class="fa fa-arrow-left"></i> Back</a>
            </div>
        </div>
           {!! Former::horizontal_open()->action( URL::route("change-pass") )->method('POST')->class('p-t-15')->role('form')->id('form') !!}
                       {{ csrf_field() }}

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Current Password</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="password" value="" name="old_password" placeholder="Current Password">
                    @if($errors->has('old_password'))<p class="help-block">{!! $errors->first('old_password') !!}</p>@endif
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">New Password</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="password" value="" name="password" placeholder="Password">
                    @if($errors->has('password'))<p class="help-block">{!! $errors->first('password') !!}</p>@endif
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Confirm Password</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="password" value="" name="password_confirmation" placeholder="Confirm Password">
                    @if($errors->has('password_confirmation'))<p class="help-block">{!! $errors->first('password_confirmation') !!}</p>@endif
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