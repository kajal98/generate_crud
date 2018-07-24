@extends('admin.layouts.panel')
@section('title','Dashboard')
@section('content')
<div class="row clearfix progress-box">
	<div class="col-lg-3 col-md-6 col-sm-12 mb-30">
		<div class="bg-white pd-20 box-shadow border-radius-5 height-100-p">
			<div class="project-info clearfix">
				<div class="project-info-left">
					<div class="icon box-shadow bg-blue text-white">
						<i class="fa fa-users"></i>
					</div>
				</div>
				<div class="project-info-right">
					<span class="no text-blue weight-500 font-24">{!! $users !!}</span>
					<a href="{!! route('users.index') !!}"><p class="weight-400 font-18">Users</p></a>
				</div>
			</div>
			<div class="project-info-progress">
				<div class="row clearfix">
					<div class="col-sm-6 text-muted weight-500">Target</div>
					<div class="col-sm-6 text-right weight-500 font-14 text-muted">{!! $users !!}</div>
				</div>
				<div class="progress" style="height: 10px;">
					<div class="progress-bar bg-blue progress-bar-striped progress-bar-animated" role="progressbar" style="width: {!! $users !!}%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-md-6 col-sm-12 mb-30">
		<div class="bg-white pd-20 box-shadow border-radius-5 height-100-p">
			<div class="project-info clearfix">
				<div class="project-info-left">
					<div class="icon box-shadow bg-light-purple text-white">
						<i class="fa fa-question"></i>
					</div>
				</div>
				<div class="project-info-right">
					<span class="no text-light-purple weight-500 font-24">{!! $inquiries !!}</span>
					<a href="{!! route('inquiry.index') !!}"><p class="weight-400 font-18">Inquiries</p></a>
				</div>
			</div>
			<div class="project-info-progress">
				<div class="row clearfix">
					<div class="col-sm-6 text-muted weight-500">Target</div>
					<div class="col-sm-6 text-right weight-500 font-14 text-muted">{!! $inquiries !!}</div>
				</div>
				<div class="progress" style="height: 10px;">
					<div class="progress-bar bg-light-purple progress-bar-striped progress-bar-animated" role="progressbar" style="width: {!! $inquiries !!}%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-md-6 col-sm-12 mb-30">
		<div class="bg-white pd-20 box-shadow border-radius-5 height-100-p">
			<div class="project-info clearfix">
				<div class="project-info-left">
					<div class="icon box-shadow bg-light-green text-white">
						<i class="fa fa-clone"></i>
					</div>
				</div>
				<div class="project-info-right">
					<span class="no text-light-green weight-500 font-24">{!! $blogs !!}</span>
					<a href="{!! route('blogs.index') !!}"><p class="weight-400 font-18">Blogs</p></a>
				</div>
			</div>
			<div class="project-info-progress">
				<div class="row clearfix">
					<div class="col-sm-6 text-muted weight-500">Target</div>
					<div class="col-sm-6 text-right weight-500 font-14 text-muted">{!! $blogs !!}</div>
				</div>
				<div class="progress" style="height: 10px;">
					<div class="progress-bar bg-light-green progress-bar-striped progress-bar-animated" role="progressbar" style="width: {!! $blogs !!}%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-md-6 col-sm-12 mb-30">
		<div class="bg-white pd-20 box-shadow border-radius-5 height-100-p">
			<div class="project-info clearfix">
				<div class="project-info-left">
					<div class="icon box-shadow bg-light-orange text-white">
						<i class="fa fa-list-alt"></i>
					</div>
				</div>
				<div class="project-info-right">
					<span class="no text-light-orange weight-500 font-24">{!! $feedbacks !!}</span>
					<a href="{!! route('feedback.index') !!}"><p class="weight-400 font-18">Feedbacks</p></a>
				</div>
			</div>
			<div class="project-info-progress">
				<div class="row clearfix">
					<div class="col-sm-6 text-muted weight-500">Target</div>
					<div class="col-sm-6 text-right weight-500 font-14 text-muted">{!! $feedbacks !!}</div>
				</div>
				<div class="progress" style="height: 10px;">
					<div class="progress-bar bg-light-orange progress-bar-striped progress-bar-animated" role="progressbar" style="width: {!! $feedbacks !!}%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
				</div>
			</div>
		</div>
	</div>
</div>			
@endsection