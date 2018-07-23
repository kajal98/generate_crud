@extends('admin.layouts.panel')
@section('title','Feedback Detail')
@section('content')
<div class="min-height-200px">
    <!-- Contextual classes Start -->
    <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
        <div class="clearfix mb-20">
            <div class="pull-left">
                <h4 class="text-blue">Feedback Detail</h4>
            </div>  
            <div class="pull-right">
                <a href="{!! route('feedback.index') !!}" class="btn btn-sm btn-primary btn-sm" rel="content-y"  role="button"><i class="fa fa-arrow-left"></i> Back</a>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped">
                <tbody>
                    <tr><th scope="col">Name</th><td>{!! $feedback->name !!}</td></tr>
                    <tr><th scope="col">Type</th><td>{!! $feedback->type !!}</td></tr>
                    <tr><th scope="col">Email</th><td>{!! $feedback->email !!}</td></tr>
                    <tr><th scope="col">Feedback</th><td>{!! $feedback->feedback !!}</td></tr>
                    <tr><th scope="col">Status</th><td>{!!$feedback->status ? "Active" : "Not Active" !!}</td></tr>
                    <tr><th scope="col">Feedback Given On</th><td>{!! $feedback->created_at !!}</td></tr>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Contextual classes End -->
</div>
@endsection