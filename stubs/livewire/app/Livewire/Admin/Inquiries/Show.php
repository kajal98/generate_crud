<?php

namespace App\Livewire\Admin\Inquiries;

use App\Models\Inquiry;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('admin.layouts.livewire')]
class Show extends Component
{
    public Inquiry $inquiry;

    public function render()
    {
        return view('livewire.admin.inquiries.show')->title('Inquiry Detail');
    }
}
