@extends('layouts.admin')
@section('title','Case Studies')
@section('content')
<div class="min-height-200px">
	<!-- Contextual classes Start -->
	<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
		<div class="clearfix mb-20">
			<div class="pull-left">
				<h4 class="text-blue">Case Studies</h4>
			</div>
			<div class="pull-right">
				<a href="/admin/case_studies/create" class="btn btn-primary btn-sm scroll-click" rel="content-y" role="button"><i class="fa fa-plus"></i> Add Case Study</a>
			</div>
		</div>
		<div class="table-responsive">
			@if(count($case_studies) > 0)
			<table class="table table-striped"  id="case_studies" class="display" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th scope="col">Title</th>
						<th scope="col">Created On?</th>
						<th scope="col">Action</th>
					</tr>
				</thead>


				<tbody>
					@foreach($case_studies as $case_study)
					<tr>		
						<td>{!! title_case($case_study->title) !!}</td>
						<td>{!! title_case($case_study->created_at) !!}</td>								
						<td class="center">
							<a href="{!!route('case_studies.show',['id'=>$case_study->id])!!}" class="btn btn-warning"><i class="fa fa-eye"></i></a>
							<a href="{!!route('case_studies.edit',['id'=>$case_study->id])!!}" class="btn btn-success"><i class="fa fa-pencil"></i></a>
							<a href="{!!route('case_studies.destroy',['id'=>$case_study->id])!!}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
						</td>
					</tr>

					@endforeach
				</tbody>

			</table>
			@else
			<p>No Case Study Found.</p>
			@endif
			<div class="pull-right">{{ $case_studies->links() }}</div>	
		</div>
	</div>	
</div>
@endsection