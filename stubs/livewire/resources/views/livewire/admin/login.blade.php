<div class="login-wrap customscroll d-flex align-items-center flex-wrap justify-content-center pd-20">
    <div class="login-box bg-white box-shadow pd-30 border-radius-5">
        <img src="{{ asset('vendor/crud/images/login-img.png') }}" alt="login" class="login-img">
        <h2 class="text-center mb-30">Login</h2>
        <form wire:submit="authenticate" class="form-horizontal">
            <div class="input-group custom input-group-lg">
                <input type="email" class="form-control" placeholder="Email" wire:model="login" required autofocus>
                <div class="input-group-append custom">
                    <span class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i></span>
                </div>
            </div>
            @error('login')<p class="help-block">{{ $message }}</p>@enderror
            <div class="input-group custom input-group-lg">
                <input type="password" class="form-control" placeholder="**********" wire:model="password" required>
                <div class="input-group-append custom">
                    <span class="input-group-text"><i class="fa fa-lock" aria-hidden="true"></i></span>
                </div>
            </div>
            @error('password')<p class="help-block">{{ $message }}</p>@enderror
            <div class="row">
                <div class="col-sm-6">
                    <div class="input-group">
                        <button type="submit" class="btn btn-outline-primary btn-lg btn-block" wire:loading.attr="disabled">Login</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
