<div class="min-height-200px">
    <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
        <div class="clearfix mb-20">
            <div class="pull-left">
                <h4 class="text-blue">Blog Detail</h4>
            </div>
            <div class="pull-right">
                <a href="{{ route('blogs.index') }}" class="btn btn-sm btn-primary" role="button"><i class="fa fa-arrow-left"></i> Back</a>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped">
                <tbody>
                    <tr><th>Title</th><td>{{ $blog->title }}</td></tr>
                    <tr><th>Author</th><td>{{ $blog->author }}</td></tr>
                    <tr><th>Description</th><td>{!! $blog->description !!}</td></tr>
                    <tr><th>Image</th><td><img src="{{ $blog->image_url('thumb') }}" alt="" height="40"></td></tr>
                    <tr><th>Meta Title</th><td>{{ $blog->meta_title }}</td></tr>
                    <tr><th>Meta Keyword</th><td>{{ $blog->meta_keyword }}</td></tr>
                    <tr><th>Meta Description</th><td>{{ $blog->meta_description }}</td></tr>
                    <tr><th>Publish</th><td>{{ $blog->publish ? 'Yes' : 'No' }}</td></tr>
                    <tr><th>Is Archive</th><td>{{ $blog->is_archive ? 'Yes' : 'No' }}</td></tr>
                    <tr><th>Category</th><td>{{ $blog->blog_category?->name }}</td></tr>
                    <tr><th>Updated On</th><td>{{ $blog->updated_at }}</td></tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
