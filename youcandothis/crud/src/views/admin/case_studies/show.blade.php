@extends('layouts.admin')
@section('title','Case Study Detail')
@section('content')
<div class="min-height-200px">
	<!-- Contextual classes Start -->
	<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
		<div class="clearfix mb-20">
			<div class="pull-left">
				<h4 class="text-blue">{!! title_case($case_study->title) !!}</h4>
			</div>	
			<div class="pull-right">
                <a href="/admin/case_studies" class="btn btn-primary btn-sm" rel="content-y"  role="button"><i class="fa fa-arrow-left"></i> Back</a>
            </div>
		</div>
		<div class="table-responsive">
			<table class="table table-striped">
				<tbody>
						<tr><th scope="col">Title</th><td>{!!$case_study->title!!}</td></tr>
						<tr><th scope="col">Content</th><td>{!!$case_study->content!!}</td></tr>
						<tr><th scope="col">Why Case Study</th><td>{!! $case_study->why_case_Study !!}</td></tr>				
						<tr><th scope="col">Publish</th><td>{!! $case_study->publish ? 'Yes' : 'No' !!}</td></tr>
						<tr><th scope="col">Is Archive ?</th><td>{!! $case_study->is_archive ? 'Yes' : 'No' !!}</td></tr>
						<tr>
							<th scope="col">Images</th>
							@foreach($case_study->photos as $photo)
								<td>
									<img src="{!! $photo->image_url('thumb') !!}" alt="">
								</td>
							@endforeach
						</tr>
						<tr><th scope="col">Created At</th><td>{!!$case_study->created_at!!}</td></tr>
						<tr><th scope="col">Updated At</th><td>{!!$case_study->updated_at!!}</td></tr>
				</tbody>
			</table>
		</div>
	</div>
	<!-- Contextual classes End -->
</div>
@endsection