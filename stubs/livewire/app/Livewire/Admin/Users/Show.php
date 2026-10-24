<?php

namespace App\Livewire\Admin\Users;

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('admin.layouts.livewire')]
#[Title('User Detail')]
class Show extends Component
{
    public User $user;

    public function render()
    {
        return view('livewire.admin.users.show');
    }
}
