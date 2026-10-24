<?php

namespace App\Livewire\Admin;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('admin.layouts.livewire-auth')]
#[Title('Login')]
class Login extends Component
{
    public string $login = '';
    public string $password = '';

    public function mount()
    {
        if (Auth::check() && in_array(Auth::user()->role, config('crud.admin_roles'), true)) {
            return $this->redirectRoute('admin-dashboard');
        }
    }

    public function authenticate()
    {
        $this->validate([
            'login' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        $key = Str::lower($this->login).'|'.request()->ip();

        if (RateLimiter::tooManyAttempts($key, 5)) {
            throw ValidationException::withMessages([
                'login' => 'Too many login attempts. Please try again in '.RateLimiter::availableIn($key).' seconds.',
            ]);
        }

        foreach (config('crud.admin_roles') as $role) {
            if (Auth::attempt(['email' => $this->login, 'password' => $this->password, 'role' => $role])) {
                RateLimiter::clear($key);
                session()->regenerate();

                return $this->redirectRoute('admin-dashboard');
            }
        }

        RateLimiter::hit($key);

        throw ValidationException::withMessages(['login' => 'Invalid email or password.']);
    }

    public function render()
    {
        return view('livewire.admin.login');
    }
}
