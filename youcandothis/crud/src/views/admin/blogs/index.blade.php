@extends('admin.layouts.panel')
@section('title','Blogs')
@section('content')
<div class="min-height-200px">

	<!-- Contextual classes Start -->
	<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
		<div class="clearfix mb-20">
			<div class="pull-left">
				<h4 class="text-blue">Blogs</h4>
			</div>
			<div class="pull-right">
				<a href="{!! route('blogs.create') !!}" class="btn btn-sm btn-primary scroll-click" rel="content-y" role="button"><i class="fa fa-plus"></i> Add Blog</a>
			</div>
		</div>
		<div class="table-responsive">
						@if(count($blogs) > 0)
						<table class="table table-striped">
						<thead>
							<tr>
								<th scope="col">Image</th>
								<th scope="col">Title</th>
								<th scope="col">Category</th>
								<th scope="col">Status</th>
								<th scope="col">Archived?</th>
								<th scope="col">Action</th>
							</tr>
						</thead>
						

						<tbody>
							@foreach($blogs as $blog)
							<tr>		
								<td>
									@if($blog->image)
									<img src="{!! $blog->image_url('thumb') !!}" alt="">
									@else
									<p>No Image</p>
									@endif
								</td>
								<td>{!! title_case($blog->title) !!}</td>
								<td>{!! $blog->blog_category ? title_case($blog->blog_category->name) : '' !!}</td>							
								<td>
									<a href="{!!route('blogs.switch',['id'=>$blog->id])!!}" title="Click here to switch account status">
										@if($blog->publish)
										<button class="btn btn-sm btn-success"><i class="fa fa-check"></i></button>
										@else
										<button class="btn btn-sm btn-danger"><i class="fa fa-ban"></i></button>
										@endif
									</a>                   
								</td>
								<td>
									@if($blog->is_archive)
									<button class="btn btn-sm btn-success">Yes</button>
									@else
									<button class="btn btn-sm btn-danger">No</button>
									@endif
								</td>
								<td><a href="{!!route('blogs.show',['id'=>$blog->id])!!}" class="btn btn-sm btn-warning"><i class="fa fa-eye"></i></a> <a href="{!!route('blogs.edit',['id'=>$blog->id])!!}" class="btn btn-sm btn-success"><i class="fa fa-pencil"></i></a> <a href="{!!route('blogs.destroy',['id'=>$blog->id])!!}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a></td>
							</tr>
							
							@endforeach
						</tbody>

					</table>
					@else
							<p>No Blog Found.</p>
							@endif
					<div class="pull-right">{{ $blogs->links() }}</div>	
				</div>
			</div>	
	</div>
	@endsection