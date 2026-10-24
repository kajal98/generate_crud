<div class="min-height-200px">
    <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
        <div class="clearfix mb-20">
            <div class="pull-left">
                <h4 class="text-blue">Feedback</h4>
            </div>
        </div>

        @if ($message)
            <div class="alert alert-success">{{ $message }}</div>
        @endif

        <div class="mb-20">
            <input type="search" wire:model.live.debounce.300ms="search" class="form-control" placeholder="Search feedback...">
        </div>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Type</th>
                        <th scope="col">Status</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($feedbackItems as $feedback)
                        <tr wire:key="feedback-{{ $feedback->id }}">
                            <th>{{ $feedback->id }}</th>
                            <td>{{ $feedback->name }}</td>
                            <td>{{ $feedback->email }}</td>
                            <td>{{ $feedback->type }}</td>
                            <td><button type="button" wire:click="toggle({{ $feedback->id }})" class="btn btn-sm {{ $feedback->status ? 'btn-success' : 'btn-danger' }}" title="Click to switch">{{ $feedback->status ? 'Active' : 'Inactive' }}</button></td>
                            <td>
                                <a href="{{ route('feedback.show', $feedback) }}" class="btn btn-sm btn-warning" title="View"><i class="fa fa-eye"></i></a>
                                <button type="button" wire:click="delete({{ $feedback->id }})" wire:confirm="Are you sure want to delete?" class="btn btn-sm btn-danger" title="Delete"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">No feedback found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{ $feedbackItems->links() }}
    </div>
</div>
