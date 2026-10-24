<?php

namespace App\Livewire\Admin\Testimonials;

use App\Models\Testimonial;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('admin.layouts.livewire')]
class Show extends Component
{
    public Testimonial $testimonial;

    public function render()
    {
        return view('livewire.admin.testimonials.show')->title('Testimonial Detail');
    }
}
