<?php

namespace App\Livewire\Admin\Feedback;

use App\Models\Feedback;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('admin.layouts.livewire')]
class Show extends Component
{
    public Feedback $feedback;

    public function render()
    {
        return view('livewire.admin.feedback.show')->title('Feedback Detail');
    }
}
