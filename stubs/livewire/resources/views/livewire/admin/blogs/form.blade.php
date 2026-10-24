<div class="min-height-200px">
    <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
        <div class="clearfix mb-20">
            <div class="pull-left">
                <h4 class="text-blue">{{ $blog->exists ? 'Edit' : 'Add' }} Blog</h4>
            </div>
            <div class="pull-right">
                <a href="{{ route('blogs.index') }}" class="btn btn-sm btn-primary" role="button"><i class="fa fa-arrow-left"></i> Back</a>
            </div>
        </div>

        <form wire:submit="save" class="p-t-15">
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label" for="title">Title</label>
                <div class="col-sm-12 col-md-10">
                    <input id="title" class="form-control" type="text" wire:model="title">
                    @error('title')<p class="help-block">{{ $message }}</p>@enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label" for="blog_category_id">Blog Category</label>
                <div class="col-sm-12 col-md-10">
                    <select id="blog_category_id" class="form-control" wire:model="blog_category_id">
                        <option value="">Select a category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('blog_category_id')<p class="help-block">{{ $message }}</p>@enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label" for="author">Author</label>
                <div class="col-sm-12 col-md-10">
                    <input id="author" class="form-control" type="text" wire:model="author">
                    @error('author')<p class="help-block">{{ $message }}</p>@enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label" for="description">Description</label>
                <div class="col-sm-12 col-md-10">
                    <textarea id="description" class="form-control" rows="6" wire:model="description"></textarea>
                    @error('description')<p class="help-block">{{ $message }}</p>@enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label" for="photo">Image</label>
                <div class="col-sm-12 col-md-10">
                    <input id="photo" type="file" class="form-control" wire:model="photo" accept="image/*">
                    <div wire:loading wire:target="photo">Uploading...</div>
                    @if ($photo?->isPreviewable())
                        <img src="{{ $photo->temporaryUrl() }}" alt="" height="100" class="m-t-10">
                    @elseif ($blog->image)
                        <img src="{{ $blog->image_url('thumb') }}" alt="" height="100" class="m-t-10">
                    @endif
                    @error('photo')<p class="help-block">{{ $message }}</p>@enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label" for="meta_title">Meta Title</label>
                <div class="col-sm-12 col-md-10">
                    <input id="meta_title" class="form-control" type="text" wire:model="meta_title">
                    @error('meta_title')<p class="help-block">{{ $message }}</p>@enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label" for="meta_keyword">Meta Keyword</label>
                <div class="col-sm-12 col-md-10">
                    <input id="meta_keyword" class="form-control" type="text" wire:model="meta_keyword">
                    @error('meta_keyword')<p class="help-block">{{ $message }}</p>@enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label" for="meta_description">Meta Description</label>
                <div class="col-sm-12 col-md-10">
                    <textarea id="meta_description" class="form-control" rows="6" wire:model="meta_description"></textarea>
                    @error('meta_description')<p class="help-block">{{ $message }}</p>@enderror
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-6 col-sm-12">
                    <div class="custom-control custom-checkbox mb-5">
                        <input id="publish" class="custom-control-input" type="checkbox" wire:model="publish">
                        <label class="custom-control-label" for="publish">Publish this blog</label>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-6 col-sm-12">
                    <div class="custom-control custom-checkbox mb-5">
                        <input id="is_archive" class="custom-control-input" type="checkbox" wire:model="is_archive">
                        <label class="custom-control-label" for="is_archive">Archive this blog</label>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-sm btn-primary m-t-10" wire:loading.attr="disabled">Save</button>
            <a href="{{ route('blogs.index') }}" class="btn btn-sm btn-warning m-t-10">Cancel</a>
        </form>
    </div>
</div>
