<?php

namespace App\Livewire\Admin\Faqs;

use App\Models\Faq;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('admin.layouts.livewire')]
class Show extends Component
{
    public Faq $faq;

    public function render()
    {
        return view('livewire.admin.faqs.show')->title('Faq Detail');
    }
}
