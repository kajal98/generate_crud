@extends('layouts.admin')
@section('title','Testimonials')
@section('content')
<div class="min-height-200px">
	<!-- Contextual classes Start -->
	<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
		<div class="clearfix mb-20">
			<div class="pull-left">
				<h4 class="text-blue">Testimonials</h4>
			</div>
			<div class="pull-right">
				<a href="{!! route('testimonial.create') !!}" class="btn btn-primary btn-sm scroll-click" rel="content-y" role="button"><i class="fa fa-plus"></i> Add Testimonial</a>
			</div>
		</div>
		<div class="table-responsive">
			@if(count($testimonials) > 0)
			<table class="table table-striped"  id="testimonials" class="display" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th scope="col">Name</th>
						<th scope="col">Designation</th>
						<th scope="col">Status</th>
						<th scope="col">Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($testimonials as $testimonial)
					<tr>
						<td>{!! title_case($testimonial->name) !!}</td>
						<td>{!! title_case($testimonial->designation) !!}</td>
						<td>
							@if($testimonial->status)
							<button class="btn btn-success">Yes</button>
							@else
							<button class="btn btn-danger">No</button>
							@endif
						</td>
						<td>
							<a href="{!!route('testimonial.show',['id'=>$testimonial->id])!!}" class="btn btn-warning"><i class="fa fa-eye"></i></a>
							<a href="{!!route('testimonial.edit',['id'=>$testimonial->id])!!}" class="btn btn-success"><i class="fa fa-pencil"></i></a>
							<a href="{!!route('testimonial.destroy',['id'=>$testimonial->id])!!}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			@else
			<p>No Testimonials Found.</p>
			@endif
			<div class="pull-right">{{ $testimonials->links() }}</div>	
		</div>
	</div>
</div>
</div>
@endsection