@extends('layouts.admin')
@section('title','Faq Detail')
@section('content')
<section class="content-header">
    <h3>Faq Detail</h3>
</section>
<div class="content">
    <div class="container-fluid container-fixed bg-white">
        <div class="panel panel-transparent">
            <div class="container-fluid">
                <div class="row add_user_profile_pic">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-10">
                                <div class="form-horizontal" >
                                    <div class="form-group">
                                        <label class="col-sm-4">Question:</label>
                                        <div class="col-sm-8">
                                            <label>{!! $faq->question !!}</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4">Answer:</label>
                                        <div class="col-sm-8">
                                            <label>{!! $faq->answer !!}</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4">Status:</label>
                                        <div class="col-sm-8">
                                            <label>{!! $faq->status ? "Open" : "Close" !!}</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label class="col-sm-4">Faq Updated On:</label>
                                            <div class="col-sm-8">
                                                <label>{!!$faq->updated_at!!}</label>
                                            </div>
                                        </div>
                                    </div>                       
                                </div>
                                <button class="btn btn-primary" ><a style="color: white;" href="{!! route('faq.index') !!}">Back</a></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection