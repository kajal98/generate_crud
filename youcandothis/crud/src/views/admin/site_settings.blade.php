@extends('layouts.admin')
@section('title','change-profile')
@section('content')
<section class="content-header">
  <h3>
    Site Settings
  </h3>
</section>
<section class="content">
  <div class="container-fluid container-fixed bg-white">
    <div class="panel panel-transparent">
      <div class="container-fluid">
        <h4></h4>
        <div class="row add_user_profile_pic">
          <div class="col-lg-6">
            {!!Former::framework('Nude') !!}
            {!!Former::open()->method('post')->action( route('site-settings'))->class('form-horizontal')->role('form')->files('true')->token() !!}
            <div class="box-body">
              <div class="form-group {{ $errors->first('title') ? 'has-error' : '' }}">
                <label for="inputEmail3" class="col-sm-4 control-label">Home Title</label>
                <div class="col-sm-8">
                  {!!  Former::text('title')->placeholder('Home Title')->id(false)->label(false)->class('form-control required')->value($site_setting->title) !!}
                  <span class="help-block">{!! $errors->first('title') !!}</span>
                </div>
              </div>
              <div class="form-group {{ $errors->first('email') ? 'has-error' : '' }}">
                <label for="inputEmail3" class="col-sm-4 control-label">Email</label>
                <div class="col-sm-8">
                  {!!  Former::text('email')->placeholder('Email')->id(false)->label(false)->class('form-control required')->value($site_setting->email) !!}
                  <span class="help-block">{!! $errors->first('email') !!}</span>
                </div>
              </div>
              <div class="form-group {{ $errors->first('phone_1') ? 'has-error' : '' }}">
                <label for="inputEmail3" class="col-sm-4 control-label">First Phone Number</label>
                <div class="col-sm-8">
                  {!!  Former::text('phone_1')->placeholder('First Phone Number')->id(false)->label(false)->class('form-control required')->value($site_setting->phone_1) !!}
                  <span class="help-block">{!! $errors->first('phone_1') !!}</span>
                </div>
              </div>
              <div class="form-group {{ $errors->first('phone_2') ? 'has-error' : '' }}">
                <label for="inputEmail3" class="col-sm-4 control-label">Second Phone Number</label>
                <div class="col-sm-8">
                  {!!  Former::text('phone_2')->placeholder('Second Phone Number')->id(false)->label(false)->class('form-control required')->value($site_setting->phone_2) !!}
                  <span class="help-block">{!! $errors->first('phone_2') !!}</span>
                </div>
              </div>
              <div class="form-group {{ $errors->first('copy_right') ? 'has-error' : '' }}">
                <label for="inputEmail3" class="col-sm-4 control-label">Copy Right Text</label>
                <div class="col-sm-8">
                  {!!  Former::text('copy_right')->placeholder('Copy Right Text')->id(false)->label(false)->class('form-control required')->value($site_setting->copy_right) !!}
                  <span class="help-block">{!! $errors->first('copy_right') !!}</span>
                </div>
              </div>
              <div class="form-group {{ $errors->first('site_visitors') ? 'has-error' : '' }}">
                <label for="inputEmail3" class="col-sm-4 control-label">Site Visitors</label>
                <div class="col-sm-8">
                  {!!  Former::text('site_visitors')->placeholder('Site Visitors')->id(false)->label(false)->class('form-control required')->value($site_setting->site_visitors) !!}
                  <span class="help-block">{!! $errors->first('site_visitors') !!}</span>
                </div>
              </div>
              <div class="form-group {{ $errors->first('doctor_phone_number') ? 'has-error' : '' }}">
                <label for="inputEmail3" class="col-sm-4 control-label">Doctor Phone Number</label>
                <div class="col-sm-8">
                  {!!  Former::text('doctor_phone_number')->placeholder('Site Visitors')->id(false)->label(false)->class('form-control required')->value($site_setting->doctor_phone_number) !!}
                  <span class="help-block">{!! $errors->first('doctor_phone_number') !!}</span>
                </div>
              </div>  
              <div class="form-group {{ $errors->first('question_limit') ? 'has-error' : '' }}">
                <label for="inputEmail3" class="col-sm-4 control-label">Question Limit</label>
                <div class="col-sm-8">
                  {!!  Former::number('question_limit')->placeholder('Question Limit')->min(1)->id(false)->label(false)->class('form-control required')->value($site_setting->question_limit) !!}
                  <span class="help-block">{!! $errors->first('question_limit') !!}</span>
                </div>
              </div>            
            </div>
            <div class="box-footer">
              <a href="{!! url('/admin') !!}" class="btn btn-default">Back</a>
              {!!  Former::submit('Submit')->id(false)->label(false)->class('btn btn-primary pull-right') !!}
            </div>
            {!!Former::close()!!}
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
