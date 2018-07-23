@extends('admin.layouts.panel')
@section('title','Inquiry Detail')
@section('content')
<div class="min-height-200px">
    <!-- Contextual classes Start -->
    <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
        <div class="clearfix mb-20">
            <div class="pull-left">
                <h4 class="text-blue">{!! title_case($inquiry->full_name) !!}'s Inquiry</h4>
            </div>  
            <div class="pull-right">
                <a href="{!! route('inquiry.index') !!}" class="btn btn-sm btn-primary btn-sm" rel="content-y"  role="button"><i class="fa fa-arrow-left"></i> Back</a>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped">
                <tbody>
                    <tr><th scope="col">Full Name</th><td>{!! title_case($inquiry->full_name) !!}</td></tr>
                    <tr><th scope="col">Email</th><td>{!! $inquiry->email !!}</td></tr>
                    <tr><th scope="col">Phone</th><td>{!! $inquiry->phone !!}</td></tr>
                    <tr><th scope="col">Message</th><td>{!! $inquiry->message !!}</td></tr>
                    <tr><th scope="col">Inquiry Asked On</th><td>{!! $inquiry->created_at !!}</td></tr>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Contextual classes End -->
</div>
@endsection