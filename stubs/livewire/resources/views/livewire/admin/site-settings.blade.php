<div class="min-height-200px">
    <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
        <div class="clearfix mb-20">
            <div class="pull-left">
                <h4 class="text-blue">Site Settings</h4>
            </div>
            <div class="pull-right">
                <a href="{{ route('admin-dashboard') }}" class="btn btn-sm btn-primary" role="button"><i class="fa fa-arrow-left"></i> Back</a>
            </div>
        </div>

        @if ($this->message)
            <div class="alert alert-success">{{ $this->message }}</div>
        @endif

        <form wire:submit="save" class="p-t-15">
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label" for="title">Title</label>
                <div class="col-sm-12 col-md-10">
                    <input id="title" class="form-control" type="text" wire:model="title">
                    @error('title')<p class="help-block">{{ $message }}</p>@enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label" for="email">Email</label>
                <div class="col-sm-12 col-md-10">
                    <input id="email" class="form-control" type="email" wire:model="email">
                    @error('email')<p class="help-block">{{ $message }}</p>@enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label" for="phone_1">Phone 1</label>
                <div class="col-sm-12 col-md-10">
                    <input id="phone_1" class="form-control" type="text" wire:model="phone_1">
                    @error('phone_1')<p class="help-block">{{ $message }}</p>@enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label" for="phone_2">Phone 2</label>
                <div class="col-sm-12 col-md-10">
                    <input id="phone_2" class="form-control" type="text" wire:model="phone_2">
                    @error('phone_2')<p class="help-block">{{ $message }}</p>@enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label" for="copy_right">Copyright</label>
                <div class="col-sm-12 col-md-10">
                    <input id="copy_right" class="form-control" type="text" wire:model="copy_right">
                    @error('copy_right')<p class="help-block">{{ $message }}</p>@enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label" for="site_visitors">Site Visitors</label>
                <div class="col-sm-12 col-md-10">
                    <input id="site_visitors" class="form-control" type="number" wire:model="site_visitors">
                    @error('site_visitors')<p class="help-block">{{ $message }}</p>@enderror
                </div>
            </div>

            <button type="submit" class="btn btn-sm btn-primary m-t-10" wire:loading.attr="disabled">Save</button>
        </form>
    </div>
</div>
