<div class="min-height-200px">
    <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
        <div class="clearfix mb-20">
            <div class="pull-left">
                <h4 class="text-blue">Users</h4>
            </div>
            <div class="pull-right">
                <a href="{{ route('users.create') }}" class="btn btn-sm btn-primary" role="button"><i class="fa fa-plus"></i> Add User</a>
            </div>
        </div>

        @if ($message)
            <div class="alert alert-success">{{ $message }}</div>
        @endif

        <div class="mb-20">
            <input type="search" wire:model.live.debounce.300ms="search" class="form-control" placeholder="Search by name or email...">
        </div>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                        <th scope="col">Active?</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr wire:key="user-{{ $user->id }}">
                            <th>{{ $user->id }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role }}</td>
                            <td>
                                <button type="button" wire:click="toggle({{ $user->id }})" class="btn btn-sm {{ $user->active ? 'btn-success' : 'btn-danger' }}" title="Click to switch">{{ $user->active ? 'Yes' : 'No' }}</button>
                            </td>
                            <td>
                                <a href="{{ route('users.show', $user) }}" class="btn btn-sm btn-warning" title="View"><i class="fa fa-eye"></i></a>
                                <a href="{{ route('users.edit', $user) }}" class="btn btn-sm btn-success" title="Edit"><i class="fa fa-pencil"></i></a>
                                <button type="button" wire:click="delete({{ $user->id }})" wire:confirm="Are you sure want to delete?" class="btn btn-sm btn-danger" title="Delete"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">No users found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{ $users->links() }}
    </div>
</div>
