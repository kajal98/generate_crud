<div class="min-height-200px">
    <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
        <div class="clearfix mb-20">
            <div class="pull-left">
                <h4 class="text-blue">Inquiries</h4>
            </div>
        </div>

        @if ($message)
            <div class="alert alert-success">{{ $message }}</div>
        @endif

        <div class="mb-20">
            <input type="search" wire:model.live.debounce.300ms="search" class="form-control" placeholder="Search inquiries...">
        </div>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Received</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($inquiries as $inquiry)
                        <tr wire:key="inquiry-{{ $inquiry->id }}">
                            <th>{{ $inquiry->id }}</th>
                            <td>{{ $inquiry->full_name }}</td>
                            <td>{{ $inquiry->email }}</td>
                            <td>{{ $inquiry->created_at?->format('d M Y') }}</td>
                            <td>
                                <a href="{{ route('inquiry.show', $inquiry) }}" class="btn btn-sm btn-warning" title="View"><i class="fa fa-eye"></i></a>
                                <button type="button" wire:click="delete({{ $inquiry->id }})" wire:confirm="Are you sure want to delete?" class="btn btn-sm btn-danger" title="Delete"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">No inquiries found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{ $inquiries->links() }}
    </div>
</div>
