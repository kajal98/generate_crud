@extends('layouts.admin')
@section('title','Edit Faq')
@section('content')
<div class="min-height-200px">
    <!-- Default Basic Forms Start -->
    <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
        <div class="clearfix">
            <div class="pull-left">
                <h4 class="text-blue">Edit Faq</h4>
                <p class="mb-30 font-14"></p>
            </div>
            <div class="pull-right">
                <a href="/admin/faq" class="btn btn-primary btn-sm" rel="content-y"  role="button"><i class="fa fa-arrow-left"></i> Back</a>
            </div>
        </div>
                        {!! Former::horizontal_open()->action( URL::route("faq.update", $faq->id) )->method('patch')->class('p-t-15')->role('form')->id('form') !!}
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Question</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" type="text" name="question" placeholder="Recent avtivities" required="" value="{!! $faq->question !!}">
                                @if($errors->has('question'))<p class="help-block">{!! $errors->first('question') !!}</p>@endif
                            </div>
                        </div>
                        <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Answer</label>
                             <div class="col-sm-12 col-md-10">
                                <textarea name="answer" placeholder="Answer">{!! $faq->answer !!}</textarea>
                                @if($errors->has('answer'))<p class="help-block">{!! $errors->first('answer') !!}</p>@endif
                            </div>
                        </div>  
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Click here to approve/active this faq</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" type="hidden" name="status" value="0">
                                <input id="activate" style="left:20px" type="checkbox" name="status" value="1">
                            </div>
                        </div>                      
                        {!!Former::submit('Save')->class('btn btn-primary btn-cons m-t-10')!!}
                        {!! Former::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="//cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
<script src="{!! asset('js/ckfinder.js') !!}"></script>
<script>
    var options = {
    filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
    filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token=',
    allowedContent:true
};
$(document).ready(function() {
    var editor = CKEDITOR.replace( 'answer',options);
    });
</script>
@endsection