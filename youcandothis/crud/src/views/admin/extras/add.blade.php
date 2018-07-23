@extends('admin.layouts.panel')
@section('title','Add Extra Page')
@section('content')
<div class="min-height-200px">
    <!-- Default Basic Forms Start -->
    <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
        <div class="clearfix">
            <div class="pull-left">
                <h4 class="text-blue">Add Extra Page</h4>
                <p class="mb-30 font-14"></p>
            </div>
            <div class="pull-right">
                <a href="{!! route('extra.index') !!}" class="btn btn-sm btn-primary btn-sm" rel="content-y"  role="button"><i class="fa fa-arrow-left"></i> Back</a>
            </div>
        </div>
        {!! Former::horizontal_open()->action( URL::route("extra.store") )->method('post')->class('p-t-15')->role('form')->id('form') !!}
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Title</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" name="title" placeholder="Recent avtivities" required="">
                @if($errors->has('title'))<p class="help-block">{!! $errors->first('title') !!}</p>@endif
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Code</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" name="code" placeholder="Recent avtivities" required="">
                @if($errors->has('code'))<p class="help-block">{!! $errors->first('code') !!}</p>@endif
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Description</label>
            <div class="col-sm-12 col-md-10">
                <textarea name="description" placeholder="Description"></textarea>
                @if($errors->has('description'))<p class="help-block">{!! $errors->first('description') !!}</p>@endif
            </div>
        </div>
        <div class="row" style="margin-left: 3px;">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="clearfix" id="previewDiv">
                    <img src="{!! asset('/images/default.jpg') !!}" id='preview' height="100px" width="100px">
                </div>
                <div id="filelist"></div>
                <div id="progressbar"></div>
                <br />
                <div class="form-group">
                    <div class="col-lg-6 clearfix">
                        <div id="container">
                            <a id="pickfiles" href="javascript:;">Upload Photo</a>
                        </div>  
                    </div>  
                </div>
                {!! Former::hidden('image')->id('photo') !!} 
            </div>
        </div>                     
        {!!Former::submit('Save')->class('btn btn-sm btn-primary btn-cons m-t-10')!!}
        {!! Former::close() !!}
    </div>
</div>
@endsection
@section('scripts')
<script src="//cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
<script>
    var options = {
    filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
    filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token=',
    allowedContent:true
};
    $(document).ready(function() {
        var editor = CKEDITOR.replace( 'description',options);
        var uploader = new plupload.Uploader({
            runtimes : 'html5,flash,silverlight,html4',
            browse_button : 'pickfiles',
            container: document.getElementById('container'),
            url : "{{ asset('plupload/upload.php') }}",
            multi_selection:false, 
                filters : {
                        max_file_size : '10mb',
                        mime_types: [
                            {title : "Image files", extensions : "jpg,gif,png"},
                        ]
                },
            flash_swf_url : "{{ asset('plupload/Moxie.swf') }}",
            silverlight_xap_url : "{{asset('plupload/Moxie.xap')}}",
            init: {
                PostInit: function() {
                    document.getElementById('filelist').innerHTML = '';
                },
                FilesAdded: function(up, files) {
                    uploader.start();
                },
                UploadComplete: function(up, files){
                    var tmp_url = '{!! asset('/tmp/') !!}';
                    plupload.each(files, function(file) {
                        $('#photo').val(file.name);
                        $('#preview').val(file.name);
                        $('#previewDiv >img').remove();
                        $('#previewDiv').append("<img src='"+tmp_url +"/"+ file.name+"' id='preview' height='100px' width='100px'/>");
                    });
                },
                Error: function(up, err) {
                    alert(err.message);
                }
            }
        });
        uploader.init();
    });
</script>
@endsection