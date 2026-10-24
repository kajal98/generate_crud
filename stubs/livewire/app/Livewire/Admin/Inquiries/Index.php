<?php

namespace App\Livewire\Admin\Inquiries;

use App\Models\Inquiry;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('admin.layouts.livewire')]
#[Title('Inquiries')]
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
        Inquiry::findOrFail($id)->delete();

        $this->message = 'Inquiry deleted successfully.';
    }

    public function render()
    {
        return view('livewire.admin.inquiries.index', [
            'inquiries' => Inquiry::query()
                ->when($this->search, fn ($query) => $query->where('full_name', 'like', '%'.$this->search.'%'))
                ->latest()
                ->paginate(10),
        ]);
    }
}
