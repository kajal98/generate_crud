@extends('admin.layouts.panel')
@section('title','Faqs')
@section('content')
<div class="min-height-200px">
	<!-- Contextual classes Start -->
	<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
		<div class="clearfix mb-20">
			<div class="pull-left">
				<h4 class="text-blue">Faqs</h4>
			</div>
			<div class="pull-right">
				<a href="{!! route('faq.create') !!}" class="btn btn-sm btn-primary scroll-click" rel="content-y" role="button"><i class="fa fa-plus"></i> Add FAQ</a>
			</div>
		</div>
		<div class="table-responsive">
			@if(count($faqs) > 0)
			<table class="table table-striped"  id="faqs" class="display" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th scope="col">Question</th>
						<th scope="col">Status</th>
						<th scope="col">Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($faqs as $faq)
					<tr>
						<td>{!! $faq->question !!}</td>
						<td>{!! $faq->status ? "Open" : "Close" !!}</td>
						<td>
							<a href="{!!route('faq.show',['id'=>$faq->id])!!}" class="btn btn-sm btn-warning"><i class="fa fa-eye"></i></a>
							<a href="{!!route('faq.edit',['id'=>$faq->id])!!}" class="btn btn-sm btn-success"><i class="fa fa-pencil"></i></a>
							<a href="{!!route('faq.destroy',['id'=>$faq->id])!!}" class="btn btn-sm btn-danger"><i class="fa fa-trash" data-confirm="Are you sure want to delete?"></i></a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			@else
			<p>No Faqs Found.</p>
			@endif
		</div>
	</div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
	$(document).ready( function () {
	    $('#faqs').DataTable(
	    	{"pageLength": 10});
	} );
</script>
@endsection