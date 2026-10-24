<?php

namespace App\Livewire\Admin\Extras;

use App\Models\Extra;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('admin.layouts.livewire')]
class Show extends Component
{
    public Extra $extra;

    public function render()
    {
        return view('livewire.admin.extras.show')->title('Extra Page Detail');
    }
}
