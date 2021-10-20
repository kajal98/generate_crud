@extends('admin.layouts.panel')
@section('title','Add User')
@section('content')
<div class="min-height-200px">
    <!-- Default Basic Forms Start -->
    <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
        <div class="clearfix">
            <div class="pull-left">
                <h4 class="text-blue">Change Profile</h4>
                <p class="mb-30 font-14"></p>
            </div>
            <div class="pull-right">
                <a href="{!! route('admin-dashboard') !!}" class="btn btn-sm btn-primary btn-sm" rel="content-y"  role="button"><i class="fa fa-arrow-left"></i> Back</a>
            </div>
        </div>
           {!! Former::horizontal_open()->action( URL::route("admin.change_profile") )->method('POST')->class('p-t-15')->role('form')->id('form') !!}
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
                    <input class="form-control" type="text" value="{!! $user->email !!}" name="email" placeholder="abc@gmail.com" readonly="">
                    @if($errors->has('email'))<p class="help-block">{!! $errors->first('email') !!}</p>@endif
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