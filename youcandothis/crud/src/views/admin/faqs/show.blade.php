@extends('admin.layouts.panel')
@section('title','Faq Detail')
@section('content')
<div class="min-height-200px">
    <!-- Contextual classes Start -->
    <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
        <div class="clearfix mb-20">
            <div class="pull-left">
                <h4 class="text-blue">Faq Detail</h4>
            </div>  
            <div class="pull-right">
                <a href="{!! route('faq.index') !!}" class="btn btn-sm btn-primary btn-sm" rel="content-y"  role="button"><i class="fa fa-arrow-left"></i> Back</a>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped">
                <tbody>
                    <tr><th>Question</th><td>{!! $faq->question !!}</td></tr>                                       
                    <tr><th>Answer</th><td>{!! $faq->answer !!}</td></tr>
                    <tr><th>Status</th><td>{!! $faq->status ? "Open" : "Close" !!}</td></tr>
                    <tr><th>Faq Updated On</th><td>{!!$faq->updated_at!!}</td></tr>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Contextual classes End -->
</div>
@endsection