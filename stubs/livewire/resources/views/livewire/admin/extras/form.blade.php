<div class="min-height-200px">
    <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
        <div class="clearfix mb-20">
            <div class="pull-left">
                <h4 class="text-blue">{{ $extra->exists ? 'Edit' : 'Add' }} Extra Page</h4>
            </div>
            <div class="pull-right">
                <a href="{{ route('extra.index') }}" class="btn btn-sm btn-primary" role="button"><i class="fa fa-arrow-left"></i> Back</a>
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
                <label class="col-sm-12 col-md-2 col-form-label" for="code">Code</label>
                <div class="col-sm-12 col-md-10">
                    <input id="code" class="form-control" type="text" wire:model="code">
                    @error('code')<p class="help-block">{{ $message }}</p>@enderror
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
                    @elseif ($extra->image)
                        <img src="{{ $extra->image_url('thumb') }}" alt="" height="100" class="m-t-10">
                    @endif
                    @error('photo')<p class="help-block">{{ $message }}</p>@enderror
                </div>
            </div>

            <button type="submit" class="btn btn-sm btn-primary m-t-10" wire:loading.attr="disabled">Save</button>
            <a href="{{ route('extra.index') }}" class="btn btn-sm btn-warning m-t-10">Cancel</a>
        </form>
    </div>
</div>
