@extends('admin.layouts.panel')
@section('title','Feedbacks')
@section('content')
<div class="min-height-200px">
	<!-- Contextual classes Start -->
	<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
		<div class="clearfix mb-20">
			<div class="pull-left">
				<h4 class="text-blue">Feedbacks</h4>
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
									<button class="btn btn-sm btn-success"><i class='fa fa-check'></i></button>
								@else
									<button class="btn btn-sm btn-danger	"><i class='fa fa-ban'></i></button>
								@endif
							</a>                   
						</td>
						<td>
							<a href="{!!route('feedback.show',['id'=>$feedback->id])!!}" class="btn btn-sm btn-warning"><i class="fa fa-eye"></i></a>
							<a href="{!!route('feedback.destroy',['id'=>$feedback->id])!!}" class="btn btn-sm btn-danger"><i class="fa fa-trash" data-confirm="Are you sure want to delete?"></i></a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			@else
			<p>No Feedbacks Found.</p>
			@endif
		</div>
	</div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
	$(document).ready( function () {
	    $('#feedbacks').DataTable(
	    	{"pageLength": 10});
	} );
</script>
@endsection