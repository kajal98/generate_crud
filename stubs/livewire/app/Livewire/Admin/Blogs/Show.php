<?php

namespace App\Livewire\Admin\Blogs;

use App\Models\Blog;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('admin.layouts.livewire')]
class Show extends Component
{
    public Blog $blog;

    public function render()
    {
        return view('livewire.admin.blogs.show')->title('Blog Detail');
    }
}
