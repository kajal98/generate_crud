@extends('layouts.admin')
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
				<a href="/admin/faq/create" class="btn btn-primary btn-sm scroll-click" rel="content-y" role="button"><i class="fa fa-plus"></i> Add FAQ</a>
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
							<a href="{!!route('faq.show',['id'=>$faq->id])!!}" class="btn btn-warning"><i class="fa fa-eye"></i></a>
							<a href="{!!route('faq.edit',['id'=>$faq->id])!!}" class="btn btn-success"><i class="fa fa-pencil"></i></a>
							<a href="{!!route('faq.destroy',['id'=>$faq->id])!!}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			@else
			<p>No Faqs Found.</p>
			@endif

			<div class="pull-right">{{ $faqs->links() }}</div>	
		</div>
	</div>

</div>
@endsection