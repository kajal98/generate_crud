<div class="min-height-200px">
    <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
        <div class="clearfix mb-20">
            <div class="pull-left">
                <h4 class="text-blue">{{ $testimonial->exists ? 'Edit' : 'Add' }} Testimonial</h4>
            </div>
            <div class="pull-right">
                <a href="{{ route('testimonial.index') }}" class="btn btn-sm btn-primary" role="button"><i class="fa fa-arrow-left"></i> Back</a>
            </div>
        </div>

        <form wire:submit="save" class="p-t-15">
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label" for="name">Name</label>
                <div class="col-sm-12 col-md-10">
                    <input id="name" class="form-control" type="text" wire:model="name">
                    @error('name')<p class="help-block">{{ $message }}</p>@enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label" for="designation">Designation</label>
                <div class="col-sm-12 col-md-10">
                    <input id="designation" class="form-control" type="text" wire:model="designation">
                    @error('designation')<p class="help-block">{{ $message }}</p>@enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label" for="text">Text</label>
                <div class="col-sm-12 col-md-10">
                    <textarea id="text" class="form-control" rows="6" wire:model="text"></textarea>
                    @error('text')<p class="help-block">{{ $message }}</p>@enderror
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-6 col-sm-12">
                    <div class="custom-control custom-checkbox mb-5">
                        <input id="status" class="custom-control-input" type="checkbox" wire:model="status">
                        <label class="custom-control-label" for="status">Click here to approve/active this testimonial</label>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-sm btn-primary m-t-10" wire:loading.attr="disabled">Save</button>
            <a href="{{ route('testimonial.index') }}" class="btn btn-sm btn-warning m-t-10">Cancel</a>
        </form>
    </div>
</div>
