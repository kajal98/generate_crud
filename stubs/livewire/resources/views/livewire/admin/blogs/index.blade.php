<div class="min-height-200px">
    <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
        <div class="clearfix mb-20">
            <div class="pull-left">
                <h4 class="text-blue">Blogs</h4>
            </div>
            <div class="pull-right">
                <a href="{{ route('blogs.create') }}" class="btn btn-sm btn-primary" role="button"><i class="fa fa-plus"></i> Add Blog</a>
            </div>
        </div>

        @if ($message)
            <div class="alert alert-success">{{ $message }}</div>
        @endif

        <div class="mb-20">
            <input type="search" wire:model.live.debounce.300ms="search" class="form-control" placeholder="Search blogs...">
        </div>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Image</th>
                        <th scope="col">Title</th>
                        <th scope="col">Category</th>
                        <th scope="col">Published</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($blogs as $blog)
                        <tr wire:key="blog-{{ $blog->id }}">
                            <th>{{ $blog->id }}</th>
                            <td><img src="{{ $blog->image_url('thumb') }}" alt="" height="40"></td>
                            <td>{{ $blog->title }}</td>
                            <td>{{ $blog->blog_category?->name }}</td>
                            <td><button type="button" wire:click="toggle({{ $blog->id }})" class="btn btn-sm {{ $blog->publish ? 'btn-success' : 'btn-danger' }}" title="Click to switch">{{ $blog->publish ? 'Yes' : 'No' }}</button></td>
                            <td>
                                <a href="{{ route('blogs.show', $blog) }}" class="btn btn-sm btn-warning" title="View"><i class="fa fa-eye"></i></a>
                                <a href="{{ route('blogs.edit', $blog) }}" class="btn btn-sm btn-success" title="Edit"><i class="fa fa-pencil"></i></a>
                                <button type="button" wire:click="delete({{ $blog->id }})" wire:confirm="Are you sure want to delete?" class="btn btn-sm btn-danger" title="Delete"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">No blogs found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{ $blogs->links() }}
    </div>
</div>
