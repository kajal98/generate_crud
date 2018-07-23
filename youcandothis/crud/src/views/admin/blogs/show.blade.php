@extends('layouts.admin')
@section('title','Blog Detail')
@section('content')
<div class="min-height-200px">
	<!-- Contextual classes Start -->
	<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
		<div class="clearfix mb-20">
			<div class="pull-left">
				<h4 class="text-blue">{!! title_case($blog->title) !!}</h4>
			</div>	
			<div class="pull-right">
                <a href="{!! route('blogs.index') !!}" class="btn btn-primary btn-sm" rel="content-y"  role="button"><i class="fa fa-arrow-left"></i> Back</a>
            </div>
		</div>
		<div class="table-responsive">
			<table class="table table-striped">
				<tbody>
						<tr>
							<th scope="col">Title</th><td>{!!$blog->title!!}</td></tr>
							<tr><th scope="col">Author</th><td>{!!$blog->author!!}</td></tr>
							<tr><th scope="col">Category</th><td>{!!$blog->blog_category->name!!}</td></tr>
							<tr><th scope="col">Description</th><td>{!!$blog->description!!}/td>
							<tr><th scope="col">Publish</th><td>{!! $blog->publish ? 'Yes' : 'No' !!}
							<tr><th scope="col">Is Archive ?</th><td>{!! $blog->is_archive ? 'Yes' : 'No' !!}
							<tr><th scope="col">Created At</th><td>{!!$blog->created_at!!}</td></tr>
							<tr><th scope="col">Updated At</th><td>{!!$blog->updated_at!!}</td>
						</tr>
				</tbody>
			</table>
		</div>
	</div>
	<!-- Contextual classes End -->
</div>
@endsection