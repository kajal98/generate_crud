<div class="min-height-200px">
    <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
        <div class="clearfix mb-20">
            <div class="pull-left">
                <h4 class="text-blue">Faqs</h4>
            </div>
            <div class="pull-right">
                <a href="{{ route('faq.create') }}" class="btn btn-sm btn-primary" role="button"><i class="fa fa-plus"></i> Add Faq</a>
            </div>
        </div>

        @if ($message)
            <div class="alert alert-success">{{ $message }}</div>
        @endif

        <div class="mb-20">
            <input type="search" wire:model.live.debounce.300ms="search" class="form-control" placeholder="Search faqs...">
        </div>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Question</th>
                        <th scope="col">Status</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($faqs as $faq)
                        <tr wire:key="faq-{{ $faq->id }}">
                            <th>{{ $faq->id }}</th>
                            <td>{{ $faq->question }}</td>
                            <td>{{ $faq->status ? 'Active' : 'Inactive' }}</td>
                            <td>
                                <a href="{{ route('faq.show', $faq) }}" class="btn btn-sm btn-warning" title="View"><i class="fa fa-eye"></i></a>
                                <a href="{{ route('faq.edit', $faq) }}" class="btn btn-sm btn-success" title="Edit"><i class="fa fa-pencil"></i></a>
                                <button type="button" wire:click="delete({{ $faq->id }})" wire:confirm="Are you sure want to delete?" class="btn btn-sm btn-danger" title="Delete"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">No faqs found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{ $faqs->links() }}
    </div>
</div>
