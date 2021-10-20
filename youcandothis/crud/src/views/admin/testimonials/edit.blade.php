@extends('admin.layouts.panel')
@section('title','Edit Testimonial')
@section('content')
<div class="min-height-200px">
    <!-- Default Basic Forms Start -->
    <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
        <div class="clearfix">
            <div class="pull-left">
                <h4 class="text-blue">Edit Testimonial</h4>
                <p class="mb-30 font-14"></p>
            </div>
            <div class="pull-right">
                <a href="{!! route('testimonial.index') !!}" class="btn btn-sm btn-primary btn-sm" rel="content-y"  role="button"><i class="fa fa-arrow-left"></i> Back</a>
            </div>
        </div>
        {!! Former::horizontal_open()->action( URL::route("testimonial.update",$testimonial->id) )->method('PATCH')->class('p-t-15')->role('form')->id('form') !!}
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Name</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" name="name" placeholder="John Doe" value="{!! $testimonial->name !!}" required="">
                @if($errors->has('name'))<p class="help-block">{!! $errors->first('name') !!}</p>@endif
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">City</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" name="designation" placeholder="City" value="{!! $testimonial->designation !!}" required="">
                @if($errors->has('designation'))<p class="help-block">{!! $errors->first('designation') !!}</p>@endif
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Text</label>
            <div class="col-sm-12 col-md-10">
                <textarea name="text">{!! $testimonial->text !!}</textarea>
                @if($errors->has('text'))<p class="help-block">{!! $errors->first('text') !!}</p>@endif
            </div>                                         
        </div>
        <div class="form-group row">
            <div class="col-md-6 col-sm-12">
                <div class="custom-control custom-checkbox mb-5">
                    <input class="form-control" type="hidden" name="status" value="0">
                    <input type="checkbox" class="custom-control-input" id="status" name="status" value="1" {!! $testimonial->status == true ? "checked" : "" !!}>
                    <label class="custom-control-label" for="status">Click here to active/inactive this testimonial</label>
                </div>
            </div>
        </div>                  
        {!!Former::submit('Save')->class('btn btn-sm btn-primary btn-cons m-t-10')!!}
        <button class="btn btn-sm btn-warning" ><a style="color: white;" href="{!! route('testimonial.index') !!}">Back</a></button>
        {!! Former::close() !!}
    </div>
</div>
@endsection
@section('scripts')
<script src="//cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
<script src="{!! asset('js/ckfinder.js') !!}"></script>
<script>
    $(document).ready(function() {
        var editor = CKEDITOR.replace( 'text',{
            allowedContent:true,
        });
        CKFinder.setupCKEditor( editor );
    });
</script>
@endsection