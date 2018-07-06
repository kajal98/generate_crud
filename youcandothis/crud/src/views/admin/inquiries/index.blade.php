@extends('layouts.admin')
@section('title','Inquiries')
@section('content')
<div class="min-height-200px">
	<!-- Contextual classes Start -->
	<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
		<div class="clearfix mb-20">
			<div class="pull-left">
				<h4 class="text-blue">Inquiries</h4>
			</div>
		</div>
		<div class="table-responsive">
			@if(count($inquiries) > 0)
			<table class="table table-striped"  id="inquiries" class="display" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th scope="col">Full Name</th>
						<th scope="col">Email</th>
						<th scope="col">Action</th>
					</tr>
				</thead>						
				<tbody>
					@foreach($inquiries as $inquiry)
					<tr>
						<td>{!! title_case($inquiry->full_name) !!}</td>
						<td>{!! $inquiry->email !!}</td>
						<td>
							<a href="{!!route('inquiry.show',['id'=>$inquiry->id])!!}" class="btn btn-warning"><i class="fa fa-eye"></i></a>
							<a href="{!!route('inquiry.destroy',['id'=>$inquiry->id])!!}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			@else
			<p>No Inquiries Found.</p>
			@endif
			<div class="pull-right">{{ $inquiries->links() }}</div>	
		</div>
	</div>
</div>
@endsection