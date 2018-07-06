@extends('layouts.admin')
@section('title','Feedback')
@section('content')
<div class="min-height-200px">
	<!-- Contextual classes Start -->
	<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
		<div class="clearfix mb-20">
			<div class="pull-left">
				<h4 class="text-blue">Feedback</h4>
			</div>
		</div>
		<div class="table-responsive">
			@if(count($feedbacks) > 0)
			<table class="table table-striped"  id="feedbacks" class="display" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th scope="col">Name</th>
						<th scope="col">Email</th>
						<th scope="col">Status</th>
						<th scope="col">Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($feedbacks as $feedback)
					<tr>
						<td>{!! title_case($feedback->name) !!}</td>
						<td>{!! $feedback->email !!}</td>
						<td>
							<a href="{!!route('feedbacks.switch',['id'=>$feedback->id])!!}" title="Click here to switch status of feedback">
								@if($feedback->status)
								<i class='btn btn-primary fa fa-check'></i>
								@else
								<i class='btn btn-danger fa fa-ban'></i>
								@endif
							</a>                   
						</td>
						<td>
							<a href="{!!route('feedback.show',['id'=>$feedback->id])!!}" class="btn btn-warning"><i class="fa fa-eye"></i></a>
							<a href="{!!route('feedback.destroy',['id'=>$feedback->id])!!}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			@else
			<p>No Feedbacks Found.</p>
			@endif
			<div class="pull-right">{{ $feedbacks->links() }}</div>	
		</div>
	</div>
</div>
@endsection