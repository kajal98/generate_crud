@extends('admin.layouts.panel')
@section('title','Extra Page Detail')
@section('content')
<div class="min-height-200px">
    <!-- Contextual classes Start -->
    <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
        <div class="clearfix mb-20">
            <div class="pull-left">
                <h4 class="text-blue">{!! title_case($extra->title) !!}</h4>
            </div>  
            <div class="pull-right">
                <a href="{!! route('extra.index') !!}" class="btn btn-sm btn-primary btn-sm" rel="content-y"  role="button"><i class="fa fa-arrow-left"></i> Back</a>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped">
                <tbody>
                        <tr>
                            <th scope="col">Title</th><td>{!!$extra->title!!}</td></tr>
                            <tr><th scope="col">Description</th><td>{!!$extra->description!!}</td></tr>
                            <tr><th scope="col">Code</th><td>{!!$extra->code!!}</td></tr>
                            <tr><th scope="col">Page Updated On</th><td>{!!$extra->updated_at!!}</td>
                        </tr>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Contextual classes End -->
</div>
@endsection