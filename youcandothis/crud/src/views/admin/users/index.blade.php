@extends('admin.layouts.panel')
@section('title','Users')
@section('content')
<div class="min-height-200px">

	<!-- Contextual classes Start -->
	<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
		<div class="clearfix mb-20">
			<div class="pull-left">
				<h4 class="text-blue">Users</h4>
			</div>
			<div class="pull-right">
				<a href="{!! route('users.create') !!}" class="btn btn-sm btn-primary scroll-click" rel="content-y" role="button"><i class="fa fa-plus"></i> Add User</a>
			</div>
		</div>
		<div class="table-responsive">
			@if($users->count() > 0)
			<table class="table table-striped" id="myTable">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">Name</th>
						<th scope="col">Email</th>
						<th scope="col">Role</th>
						<th scope="col">Active ?</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					@foreach($users as $user)
						<tr>
							<th>{!! $user->id !!}</th>
							<td>{!! $user->name !!}</td>
							<td>{!! $user->email !!}</td>
							<td>{!! $user->role !!}</td>
							<td>
								@if($user->active)
								<button class="btn btn-sm btn-success">Yes</button>
								@else
								<button class="btn btn-sm btn-danger">No</button>
								@endif
							</td>
							<td>
								<a href="{!!route('users.show',['id'=>$user->id])!!}" class="btn btn-sm btn-warning"><i class="fa fa-eye"></i></a>
								<a href="{!!route('users.edit',['id'=>$user->id])!!}" class="btn btn-sm btn-success"><i class="fa fa-pencil"></i></a>
								<a href="{!!route('users.destroy',['id'=>$user->id])!!}" class="btn btn-sm btn-danger"><i class="fa fa-trash" data-confirm="Are you sure want to delete?"></i></a>
							</td>
						</tr>
					@endforeach						 
				</tbody>
			</table>
			@else
				<P>No users found</P>
			@endif
		</div>
	</div>
	<!-- Contextual classes End -->
</div>
@endsection
@section('scripts')
<script type="text/javascript">
	$(document).ready( function () {
	    $('#myTable').DataTable(
	    	{"pageLength": 10});
	} );
</script>
@endsection