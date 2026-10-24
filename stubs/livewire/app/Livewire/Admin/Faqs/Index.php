<?php

namespace App\Livewire\Admin\Faqs;

use App\Models\Faq;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('admin.layouts.livewire')]
#[Title('Faqs')]
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
        Faq::findOrFail($id)->delete();

        $this->message = 'Faq deleted successfully.';
    }

    public function render()
    {
        return view('livewire.admin.faqs.index', [
            'faqs' => Faq::query()
                ->when($this->search, fn ($query) => $query->where('question', 'like', '%'.$this->search.'%'))
                ->latest()
                ->paginate(10),
        ]);
    }
}
