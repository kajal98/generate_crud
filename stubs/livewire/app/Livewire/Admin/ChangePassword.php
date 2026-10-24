<?php

namespace App\Livewire\Admin;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('admin.layouts.livewire')]
#[Title('Change Password')]
class ChangePassword extends Component
{
    public string $old_password = '';
    public string $password = '';
    public string $password_confirmation = '';

    public ?string $message = null;

    protected function rules(): array
    {
        return [
            'old_password' => ['required', 'current_password'],
            'password' => ['required', 'string', 'min:8', 'max:64', 'confirmed', 'different:old_password'],
        ];
    }

    protected function messages(): array
    {
        return [
            'old_password.current_password' => 'Please enter correct old password',
        ];
    }

    public function save(): void
    {
        $this->validate();

        Auth::user()->forceFill(['password' => Hash::make($this->password)])->save();

        $this->reset('old_password', 'password', 'password_confirmation');
        $this->message = 'Your password successfully changed';
    }

    public function render()
    {
        return view('livewire.admin.change-password');
    }
}
