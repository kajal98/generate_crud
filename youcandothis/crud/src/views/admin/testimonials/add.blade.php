@extends('layouts.admin')
@section('title','Add Testimonial')
@section('content')
<div class="min-height-200px">
    <!-- Default Basic Forms Start -->
    <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
        <div class="clearfix">
            <div class="pull-left">
                <h4 class="text-blue">Add Testimonial</h4>
                <p class="mb-30 font-14"></p>
            </div>
            <div class="pull-right">
                <a href="{!! route('testimonial.index') !!}" class="btn btn-primary btn-sm" rel="content-y"  role="button"><i class="fa fa-arrow-left"></i> Back</a>
            </div>
        </div>
        {!! Former::horizontal_open()->action( URL::route("testimonial.store") )->method('POST')->class('p-t-15')->role('form')->id('form') !!}
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Name</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" name="name" placeholder="John Doe" required="">
                @if($errors->has('name'))<p class="help-block">{!! $errors->first('name') !!}</p>@endif
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">City</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" name="designation" placeholder="City" required="">
                @if($errors->has('designation'))<p class="help-block">{!! $errors->first('designation') !!}</p>@endif
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Text</label>
            <div class="col-sm-12 col-md-10">
                <textarea name="text"></textarea>
                @if($errors->has('text'))<p class="help-block">{!! $errors->first('text') !!}</p>@endif
            </div>                                         
        </div>

        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Click here to approve/active this testimonial</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="hidden" name="status" value="0">
                <input id="activate" style="left:20px" type="checkbox" value="1" name="status">
            </div>
        </div>                       
        {!!Former::submit('Save')->class('btn btn-primary btn-cons m-t-10')!!}
        <button class="btn btn-warning" ><a style="color: white;" href="{!! route('testimonial.index') !!}">Back</a></button>
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