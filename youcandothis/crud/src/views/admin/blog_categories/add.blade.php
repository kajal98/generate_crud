@extends('admin.layouts.panel')
@section('title','Add Blog Category')
@section('content')
<div class="min-height-200px">
    <!-- Default Basic Forms Start -->
    <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
        <div class="clearfix">
            <div class="pull-left">
                <h4 class="text-blue">Add Blog Category</h4>
                <p class="mb-30 font-14"></p>
            </div>
            <div class="pull-right">
                <a href="{!! route('blog_categories.index') !!}" class="btn btn-sm btn-primary btn-sm" rel="content-y"  role="button"><i class="fa fa-arrow-left"></i> Back</a>
            </div>
        </div>
        {!! Former::horizontal_open()->action( URL::route("blog_categories.store") )->method('POST')->class('p-t-15')->role('form')->id('form') !!}
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Name</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" name="name" placeholder="Recent avtivities" required="">
                @if($errors->has('name'))<p class="help-block">{!! $errors->first('name') !!}</p>@endif
            </div>                                   
        </div>
        {!!Former::submit('Save')->class('btn btn-sm btn-primary btn-cons m-t-10')!!}
        <button class="btn btn-sm btn-warning" ><a style="color: white;" href="{!! route('blog_categories.index') !!}">Back</a></button>
        {!! Former::close() !!}
    </div>
</div>
@endsection