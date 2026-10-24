<div class="min-height-200px">
    <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
        <div class="clearfix mb-20">
            <div class="pull-left">
                <h4 class="text-blue">Extra Pages</h4>
            </div>
            <div class="pull-right">
                <a href="{{ route('extra.create') }}" class="btn btn-sm btn-primary" role="button"><i class="fa fa-plus"></i> Add Extra Page</a>
            </div>
        </div>

        @if ($message)
            <div class="alert alert-success">{{ $message }}</div>
        @endif

        <div class="mb-20">
            <input type="search" wire:model.live.debounce.300ms="search" class="form-control" placeholder="Search extra pages...">
        </div>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Image</th>
                        <th scope="col">Title</th>
                        <th scope="col">Code</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($extras as $extra)
                        <tr wire:key="extra-{{ $extra->id }}">
                            <th>{{ $extra->id }}</th>
                            <td><img src="{{ $extra->image_url('thumb') }}" alt="" height="40"></td>
                            <td>{{ $extra->title }}</td>
                            <td>{{ $extra->code }}</td>
                            <td>
                                <a href="{{ route('extra.show', $extra) }}" class="btn btn-sm btn-warning" title="View"><i class="fa fa-eye"></i></a>
                                <a href="{{ route('extra.edit', $extra) }}" class="btn btn-sm btn-success" title="Edit"><i class="fa fa-pencil"></i></a>
                                <button type="button" wire:click="delete({{ $extra->id }})" wire:confirm="Are you sure want to delete?" class="btn btn-sm btn-danger" title="Delete"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">No extra pages found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{ $extras->links() }}
    </div>
</div>
