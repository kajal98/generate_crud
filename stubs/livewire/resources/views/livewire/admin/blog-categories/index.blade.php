<div class="min-height-200px">
    <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
        <div class="clearfix mb-20">
            <div class="pull-left">
                <h4 class="text-blue">Blog Categories</h4>
            </div>
            <div class="pull-right">
                <a href="{{ route('blog_categories.create') }}" class="btn btn-sm btn-primary" role="button"><i class="fa fa-plus"></i> Add Blog Category</a>
            </div>
        </div>

        @if ($message)
            <div class="alert alert-success">{{ $message }}</div>
        @endif

        <div class="mb-20">
            <input type="search" wire:model.live.debounce.300ms="search" class="form-control" placeholder="Search blog categories...">
        </div>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($blogCategories as $blogCategory)
                        <tr wire:key="blogCategory-{{ $blogCategory->id }}">
                            <th>{{ $blogCategory->id }}</th>
                            <td>{{ $blogCategory->name }}</td>
                            <td>{{ $blogCategory->slug }}</td>
                            <td>
                                <a href="{{ route('blog_categories.edit', $blogCategory) }}" class="btn btn-sm btn-success" title="Edit"><i class="fa fa-pencil"></i></a>
                                <button type="button" wire:click="delete({{ $blogCategory->id }})" wire:confirm="Are you sure want to delete?" class="btn btn-sm btn-danger" title="Delete"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">No blog categories found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{ $blogCategories->links() }}
    </div>
</div>
