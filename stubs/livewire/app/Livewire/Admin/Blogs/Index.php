<?php

namespace App\Livewire\Admin\Blogs;

use App\Models\Blog;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('admin.layouts.livewire')]
#[Title('Blogs')]
class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    #[Url]
    public string $search = '';

    public ?string $message = null;

    public function updatedSearch(): void
    {
        $this->resetPage();
    }

    public function delete(int $id): void
    {
        Blog::findOrFail($id)->delete();

        $this->message = 'Blog deleted successfully.';
    }

    public function toggle(int $id): void
    {
        $blog = Blog::findOrFail($id);
        $blog->publish = $blog->publish ? 0 : 1;
        $blog->save();

        $this->message = 'Status updated successfully.';
    }

    public function render()
    {
        return view('livewire.admin.blogs.index', [
            'blogs' => Blog::query()
                ->with('blog_category')
                ->when($this->search, fn ($query) => $query->where('title', 'like', '%'.$this->search.'%'))
                ->latest()
                ->paginate(10),
        ]);
    }
}
