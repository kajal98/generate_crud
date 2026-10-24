<?php

namespace App\Livewire\Admin\Users;

use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('admin.layouts.livewire')]
class Form extends Component
{
    public User $user;

    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';
    public string $phone = '';
    public string $mobile = '';
    public string $address = '';
    public string $city = '';
    public string $state = '';
    public string $country = '';
    public bool $active = false;

    public function mount(?User $user = null): void
    {
        $this->user = $user ?? new User;

        foreach (['name', 'email', 'phone', 'mobile', 'address', 'city', 'state', 'country'] as $field) {
            $this->{$field} = (string) ($this->user->{$field} ?? '');
        }
        $this->active = (bool) $this->user->active;
    }

    protected function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:30'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')->ignore($this->user->id)],
            'password' => [$this->user->exists ? 'nullable' : 'required', 'string', 'min:8', 'confirmed'],
            'phone' => ['required', 'string', 'max:255'],
            'mobile' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'state' => ['required', 'string', 'max:255'],
            'country' => ['required', 'string', 'max:255'],
            'active' => ['boolean'],
        ];
    }

    public function save()
    {
        $creating = ! $this->user->exists;
        $validated = $this->validate();

        // forceFill keeps this working whatever $fillable your User model declares
        $this->user->forceFill(Arr::except($validated, ['password']));

        if ($validated['password']) {
            $this->user->password = Hash::make($validated['password']);
        }

        if ($creating) {
            $this->user->role = 'user';
        }

        $this->user->save();

        session()->flash('success', $creating ? 'User created successfully.' : 'User details updated successfully.');

        return $this->redirectRoute('users.index');
    }

    public function render()
    {
        return view('livewire.admin.users.form')
            ->title(($this->user->exists ? 'Edit' : 'Add').' User');
    }
}
