<?php

namespace App\Livewire\Admin\BlogCategories;

use App\Models\BlogCategory;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('admin.layouts.livewire')]
#[Title('Blog Categories')]
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
        BlogCategory::findOrFail($id)->delete();

        $this->message = 'Blog Category deleted successfully.';
    }

    public function render()
    {
        return view('livewire.admin.blog-categories.index', [
            'blogCategories' => BlogCategory::query()
                ->when($this->search, fn ($query) => $query->where('name', 'like', '%'.$this->search.'%'))
                ->latest()
                ->paginate(10),
        ]);
    }
}
