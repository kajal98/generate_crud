@extends('admin.layouts.panel')
@section('title','Add Blog')
@section('content')
<div class="min-height-200px">
    <!-- Default Basic Forms Start -->
    <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
        <div class="clearfix">
            <div class="pull-left">
                <h4 class="text-blue">Add Blog</h4>
                <p class="mb-30 font-14"></p>
            </div>
            <div class="pull-right">
                <a href="{!! route('blogs.index') !!}" class="btn btn-sm btn-primary btn-sm" rel="content-y"  role="button"><i class="fa fa-arrow-left"></i> Back</a>
            </div>
        </div>
        {!! Former::horizontal_open()->action( URL::route("blogs.store") )->method('post')->class('p-t-15')->role('form')->id('form') !!}
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Title</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" name="title" placeholder="Recent avtivities" required="">
                @if($errors->has('title'))<p class="help-block">{{ $errors->first('title') }}</p>@endif
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Author</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" name="author" placeholder="John Doe" required="">
                @if($errors->has('author'))<p class="help-block">{{ $errors->first('author') }}</p>@endif
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Category</label>
            <div class="col-sm-12 col-md-10">
                <select class="form-control selectpicker" name="blog_category_id" style="margin-left: 16px;">
                    @foreach(App\Models\BlogCategory::all() as $blog)
                    <option value="{{ $blog->id }}">{{ $blog->name }}</option>
                    @endforeach
                </select>
                <br /><br /><a href="{!! route('blog_categories.create') !!}" class="btn btn-sm btn-info">Add New Blog Category</a>
                @if($errors->has('blog_category_id'))<p class="help-block">{{ $errors->first('blog_category_id') }}</p>@endif
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">DescrIption</label>
            <div class="col-sm-12 col-md-10">
                <textarea name="description" required=""></textarea>
                @if($errors->has('description'))<p class="help-block">{{ $errors->first('description') }}</p>@endif
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Meta Title</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" name="meta_title" placeholder="Meta Title">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Meta Keyword</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" name="meta_keyword" placeholder="Meta Keyword">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Meta Description</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" name="meta_description" placeholder="Meta Description">
            </div>
        </div>
        <div class="row" style="margin-left: 3px;">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="clearfix" id="previewDiv">
                    <img src="{!! asset('vendor/crud/images/default.jpg') !!}" id='preview' height="100px" width="100px">
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
        <div class="form-group row">
            <div class="col-md-6 col-sm-12">
                <div class="custom-control custom-checkbox mb-5">
                    <input class="form-control" type="hidden" name="publish" value="0">
                    <input type="checkbox" class="custom-control-input" id="publish" name="publish" value="1">
                    <label class="custom-control-label" for="publish">Click here to publish/unpublish this blog</label>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-6 col-sm-12">
                <div class="custom-control custom-checkbox mb-5">
                    <input class="form-control" type="hidden" name="is_archive" value="0">
                    <input type="checkbox" class="custom-control-input" id="is_archive" name="is_archive" value="1">
                    <label class="custom-control-label" for="is_archive">Is archive or not ?</label>
                </div>
            </div>
        </div>        
        {!!Former::submit('Save')->class('btn btn-sm btn-primary btn-cons m-t-10')!!}
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
<script src="{{ asset('vendor/crud/js/plupload.full.min.js') }}"></script>
<script>
    var options = {
//filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
//filebrowserImageUploadUrl: 'laravel-filemanager/upload?type=Images&_token=',
filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token=',
allowedContent:true
};
$(document).ready(function() {
    var editor = CKEDITOR.replace( 'description',options);
    var uploader = new plupload.Uploader({
        runtimes : 'html5',
        browse_button : 'pickfiles',
        container: document.getElementById('container'),
        url : "{{ route('admin.upload') }}",
        multipart_params : { _token : "{{ csrf_token() }}" },
        file_data_name : 'file',
        multi_selection:false, 
            filters : {
                    max_file_size : '10mb',
                    mime_types: [
                        {title : "Image files", extensions : "jpg,gif,png"},
                    ]
            },
        init: {
            PostInit: function() {
                document.getElementById('filelist').innerHTML = '';
            },
            FilesAdded: function(up, files) {
                uploader.start();
                jQuery('.loader').fadeToggle('medium');
            },
            FileUploaded: function(up, file, result){
                var name = JSON.parse(result.response).name;
                var tmp_url = '{!! asset('tmp') !!}';
                $('#photo').val(name);
                $('#preview').val(name);
                $('#previewDiv >img').remove();
                $('#previewDiv').append("<img src='"+tmp_url+"/"+name+"' id='preview' height='100px' width='100px'/>");
            },
            UploadComplete: function(up, files){
                jQuery('.loader').fadeToggle('medium');
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