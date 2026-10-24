<div class="min-height-200px">
    <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
        <div class="clearfix mb-20">
            <div class="pull-left">
                <h4 class="text-blue">{{ $user->exists ? 'Edit' : 'Add' }} User</h4>
            </div>
            <div class="pull-right">
                <a href="{{ route('users.index') }}" class="btn btn-sm btn-primary" role="button"><i class="fa fa-arrow-left"></i> Back</a>
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
                <label class="col-sm-12 col-md-2 col-form-label" for="email">Email</label>
                <div class="col-sm-12 col-md-10">
                    <input id="email" class="form-control" type="email" wire:model="email">
                    @error('email')<p class="help-block">{{ $message }}</p>@enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label" for="password">Password</label>
                <div class="col-sm-12 col-md-10">
                    <input id="password" class="form-control" type="password" wire:model="password"> @if ($user->exists)<small class="text-muted">Leave blank to keep the current password.</small>@endif
                    @error('password')<p class="help-block">{{ $message }}</p>@enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label" for="password_confirmation">Confirm Password</label>
                <div class="col-sm-12 col-md-10">
                    <input id="password_confirmation" class="form-control" type="password" wire:model="password_confirmation">
                    @error('password_confirmation')<p class="help-block">{{ $message }}</p>@enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label" for="phone">Phone</label>
                <div class="col-sm-12 col-md-10">
                    <input id="phone" class="form-control" type="text" wire:model="phone">
                    @error('phone')<p class="help-block">{{ $message }}</p>@enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label" for="mobile">Mobile</label>
                <div class="col-sm-12 col-md-10">
                    <input id="mobile" class="form-control" type="text" wire:model="mobile">
                    @error('mobile')<p class="help-block">{{ $message }}</p>@enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label" for="address">Address</label>
                <div class="col-sm-12 col-md-10">
                    <input id="address" class="form-control" type="text" wire:model="address">
                    @error('address')<p class="help-block">{{ $message }}</p>@enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label" for="city">City</label>
                <div class="col-sm-12 col-md-10">
                    <input id="city" class="form-control" type="text" wire:model="city">
                    @error('city')<p class="help-block">{{ $message }}</p>@enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label" for="state">State</label>
                <div class="col-sm-12 col-md-10">
                    <input id="state" class="form-control" type="text" wire:model="state">
                    @error('state')<p class="help-block">{{ $message }}</p>@enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label" for="country">Country</label>
                <div class="col-sm-12 col-md-10">
                    <input id="country" class="form-control" type="text" wire:model="country">
                    @error('country')<p class="help-block">{{ $message }}</p>@enderror
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-6 col-sm-12">
                    <div class="custom-control custom-checkbox mb-5">
                        <input id="active" class="custom-control-input" type="checkbox" wire:model="active">
                        <label class="custom-control-label" for="active">Click here to activate this user</label>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-sm btn-primary m-t-10" wire:loading.attr="disabled">Save</button>
            <a href="{{ route('users.index') }}" class="btn btn-sm btn-warning m-t-10">Cancel</a>
        </form>
    </div>
</div>
