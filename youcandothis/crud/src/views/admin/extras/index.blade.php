@extends('admin.layouts.panel')
@section('title','Extra Pages')
@section('content')
<div class="min-height-200px">
	<!-- Contextual classes Start -->
	<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
		<div class="clearfix mb-20">
			<div class="pull-left">
				<h4 class="text-blue">Extra Pages</h4>
			</div>
			<div class="pull-right">
				<a href="{!! route('extra.create') !!}" class="btn btn-sm btn-primary scroll-click" rel="content-y" role="button"><i class="fa fa-plus"></i> Add Extra Page</a>
			</div>
		</div>
		<div class="table-responsive">
			@if(count($extras) > 0)
			<table class="table table-striped"  id="extras" class="display" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th scope="col">Code</th>
						<th scope="col">Title</th>
						<th scope="col">Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($extras as $extra)
					<tr>
						<td>{!! $extra->code !!}</td>
						<td>{!! title_case($extra->title) !!}</td>
						<td>
							<a href="{!!route('extra.show',['id'=>$extra->id])!!}" class="btn btn-sm btn-warning"><i class="fa fa-eye"></i></a>
							<a href="{!!route('extra.edit',['id'=>$extra->id])!!}" class="btn btn-sm btn-success"><i class="fa fa-pencil"></i></a>
							<a href="{!!route('extra.destroy',['id'=>$extra->id])!!}" class="btn btn-sm btn-danger"><i class="fa fa-trash" data-confirm="Are you sure want to delete?"></i></a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			@else
			<p>No Extras Found.</p>
			@endif
		</div>
	</div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
	$(document).ready( function () {
	    $('#extras').DataTable(
	    	{"pageLength": 10});
	} );
</script>
@endsection