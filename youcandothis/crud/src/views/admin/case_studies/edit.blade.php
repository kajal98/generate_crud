@extends('layouts.admin')
@section('title','Case Study')
@section('content')
<!-- Content Header (Page header) -->
<div class="min-height-200px">
    <!-- Default Basic Forms Start -->
    <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
        <div class="clearfix">
            <div class="pull-left">
                <h4 class="text-blue">Edit Case Study</h4>
                <p class="mb-30 font-14"></p>
            </div>
            <div class="pull-right">
                <a href="{!! route('case_studies.index') !!}" class="btn btn-primary btn-sm" rel="content-y"  role="button"><i class="fa fa-arrow-left"></i> Back</a>
            </div>
        </div>
        {!! Former::horizontal_open()->action( URL::route("case_studies.update",$case_study->id) )->method('PATCH')->class('p-t-15')->role('form')->id('form') !!}
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Title</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" name="title" placeholder="Recent avtivities" required="" value="{!! $case_study->title !!}">
                @if($errors->has('title'))<p class="help-block">{!! $errors->first('title') !!}</p>@endif
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Content</label>
            <div class="col-sm-12 col-md-10">
                <textarea name="content" required="">{!! $case_study->content !!}</textarea>
                @if($errors->has('content'))<p class="help-block">{!! $errors->first('content') !!}</p>@endif
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Why Case Study</label>
            <div class="col-sm-12 col-md-10">
                <textarea name="why_case_study" required="">{!! $case_study->why_case_study !!}</textarea>
                @if($errors->has('why_case_study'))<p class="help-block">{!! $errors->first('why_case_study') !!}</p>@endif
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
                {!! Former::hidden('image')->id('photo')->value($case_study->image) !!}
            </div>
        </div>
        <div class="row" style="margin-left: 3px;">
            <div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <label for="text" style="margin-left: 20px;"></label>
                    <div class="form-group">
                        <div class="col-lg-4">    
                            <div id="container">
                                <a id="pickfiles" href="javascript:;">Upload Photo</a>
                            </div>
                        </div>
                        <div class="col-lg-6" id="previewDiv">
                            @foreach($case_study->photos as $photo)
                            <td>
                                <a href="{!!route('photo.delete',['id'=>$photo->id])!!}" data-confirm="Are you sure want to delete?" data-toggle="tooltip" title="Click to remove photo!"><img src="{!! $photo->image_url('thumb') !!}" alt="" style="margin: 3px;"></a>
                            </td>
                            @endforeach
                        </div>  
                    </div>
                </div>
                <div id="filelist"></div>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Click here to publish/unpublish this case_study</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="hidden" name="publish" value="0">
                <input id="activate" style="left:20px" type="checkbox" name="publish" value="{!! $case_study->publish ? true : false !!}">
            </div>
        </div>
        {!!Former::submit('Save')->class('btn btn-primary btn-cons m-t-10')!!}
        <button class="btn btn-warning" ><a style="color: white;" href="{!! route('case_studies.index') !!}">Back</a></button>
        {!! Former::close() !!}
    </div>
</div>
@endsection
@section('scripts')
<script src="//cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
<script>
    var options = {
        filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
        filebrowserImageUploadUrl: 'laravel-filemanager/upload?type=Images&_token=',
        filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
        filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token=',
        allowedContent:true
    };
    $(document).ready(function() {
        var editor = CKEDITOR.replace( 'content',options);
        var editor = CKEDITOR.replace( 'why_case_study',options);
        var uploader = new plupload.Uploader({
            runtimes : 'html5,flash,silverlight,html4',
browse_button : 'pickfiles', // you can pass in id...
container: document.getElementById('container'), // ... or DOM Element itself
url : "{{ asset('plupload/upload.php') }}",
    filters : {
            max_file_size : '10mb',
            mime_types: [
                {title : "Image files", extensions : "jpg,gif,png"},
            ]
    },
// Flash settings
flash_swf_url : "{{ asset('plupload/Moxie.swf') }}",
// Silverlight settings
silverlight_xap_url : "{{asset('plupload/Moxie.xap')}}",
init: {
    PostInit: function() {
        document.getElementById('filelist').innerHTML = '';
    },
    FilesAdded: function(up, files) {
        plupload.each(files, function(file) {
            file.name = "{{ uniqid() }}_"+file.name;
        });
        uploader.start();
        jQuery('.loader').fadeToggle('medium');
    },
    FileUploaded: function(up,file) {
        var input = document.createElement("input");
        input.type = "hidden";
        input.name = "images[]";
        input.value = file.name;
        $(input).appendTo("#container");
        var tmp_url = '{!! asset('/tmp/') !!}';
        $('#previewDiv').append("<img src='"+tmp_url +"/"+ file.name+"' style='margin:5px;' id='preview' height='100px' width='100px'/>");
    },
    UploadComplete: function(up, files){
        var tmp_url = '{!! asset('/tmp/') !!}';
        plupload.each(files, function(file) {
            $('#photo').val(file.name);
            $('#preview').val(file.name);
        });
        jQuery('.loader').fadeToggle('medium');
    },
    Error: function(up, err) {
        alert(err.message);
    }
}
});
        uploader.init();
    });
    jQuery("#subscription_form").on('submit',function(e){
        var _this = this;
        e.preventDefault(); 
        $.post(jQuery(this).attr('action'),jQuery(this).serialize(),function(response){   
        })
        .done(function(response) {
            console.log(response);
            jQuery('.alert-success').html(response).show();
            $("#subscription_form")[0].reset();
        })
        .fail(function(response) {
            jQuery('.alert-danger').html(response.responseJSON).show();
        });      
        setTimeout(function(){ jQuery(".alert-danger").fadeOut() }, 10000);
        setTimeout(function(){ jQuery(".alert-success").fadeOut() }, 10000);
        return false;
    });
</script>
@endsection