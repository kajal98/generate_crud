<?php

namespace App\Livewire\Admin;

use App\Models\Blog;
use App\Models\Feedback;
use App\Models\Inquiry;
use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('admin.layouts.livewire')]
#[Title('Dashboard')]
class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.admin.dashboard', [
            'users' => User::where('role', 'user')->where('active', 1)->count(),
            'blogs' => Blog::count(),
            'inquiries' => Inquiry::count(),
            'feedbacks' => Feedback::count(),
        ]);
    }
}
