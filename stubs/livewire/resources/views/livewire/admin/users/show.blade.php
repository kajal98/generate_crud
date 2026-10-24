<div class="min-height-200px">
    <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
        <div class="clearfix mb-20">
            <div class="pull-left">
                <h4 class="text-blue">User Detail</h4>
            </div>
            <div class="pull-right">
                <a href="{{ route('users.index') }}" class="btn btn-sm btn-primary" role="button"><i class="fa fa-arrow-left"></i> Back</a>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped">
                <tbody>
                    <tr><th>Name</th><td>{{ $user->name }}</td></tr>
                    <tr><th>Email</th><td>{{ $user->email }}</td></tr>
                    <tr><th>Phone</th><td>{{ $user->phone }}</td></tr>
                    <tr><th>Mobile</th><td>{{ $user->mobile }}</td></tr>
                    <tr><th>Address</th><td>{{ $user->address }}</td></tr>
                    <tr><th>City</th><td>{{ $user->city }}</td></tr>
                    <tr><th>State</th><td>{{ $user->state }}</td></tr>
                    <tr><th>Country</th><td>{{ $user->country }}</td></tr>
                    <tr><th>Active</th><td>{{ $user->active ? 'Yes' : 'No' }}</td></tr>
                    <tr><th>Joined</th><td>{{ $user->created_at }}</td></tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
