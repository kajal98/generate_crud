<?php

namespace App\Livewire\Admin;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('admin.layouts.livewire')]
#[Title('Change Profile')]
class Profile extends Component
{
    public string $name = '';
    public string $email = '';

    public ?string $message = null;

    public function mount(): void
    {
        $this->name = (string) Auth::user()->name;
        $this->email = (string) Auth::user()->email;
    }

    protected function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:30'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')->ignore(Auth::id())],
        ];
    }

    protected function messages(): array
    {
        return [
            'name.required' => 'Please enter full name',
            'email.required' => 'Please enter email',
            'email.email' => 'Please enter valid email',
        ];
    }

    public function save(): void
    {
        Auth::user()->forceFill($this->validate())->save();

        $this->message = 'Profile updated successfully';
    }

    public function render()
    {
        return view('livewire.admin.profile');
    }
}
