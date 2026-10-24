<div class="min-height-200px">
    <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
        <div class="clearfix mb-20">
            <div class="pull-left">
                <h4 class="text-blue">Testimonials</h4>
            </div>
            <div class="pull-right">
                <a href="{{ route('testimonial.create') }}" class="btn btn-sm btn-primary" role="button"><i class="fa fa-plus"></i> Add Testimonial</a>
            </div>
        </div>

        @if ($message)
            <div class="alert alert-success">{{ $message }}</div>
        @endif

        <div class="mb-20">
            <input type="search" wire:model.live.debounce.300ms="search" class="form-control" placeholder="Search testimonials...">
        </div>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Designation</th>
                        <th scope="col">Status</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($testimonials as $testimonial)
                        <tr wire:key="testimonial-{{ $testimonial->id }}">
                            <th>{{ $testimonial->id }}</th>
                            <td>{{ $testimonial->name }}</td>
                            <td>{{ $testimonial->designation }}</td>
                            <td>{{ $testimonial->status ? 'Active' : 'Inactive' }}</td>
                            <td>
                                <a href="{{ route('testimonial.show', $testimonial) }}" class="btn btn-sm btn-warning" title="View"><i class="fa fa-eye"></i></a>
                                <a href="{{ route('testimonial.edit', $testimonial) }}" class="btn btn-sm btn-success" title="Edit"><i class="fa fa-pencil"></i></a>
                                <button type="button" wire:click="delete({{ $testimonial->id }})" wire:confirm="Are you sure want to delete?" class="btn btn-sm btn-danger" title="Delete"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">No testimonials found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{ $testimonials->links() }}
    </div>
</div>
