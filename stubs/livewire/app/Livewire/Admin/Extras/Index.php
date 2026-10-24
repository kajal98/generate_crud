<?php

namespace App\Livewire\Admin\Extras;

use App\Models\Extra;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('admin.layouts.livewire')]
#[Title('Extra Pages')]
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
        Extra::findOrFail($id)->delete();

        $this->message = 'Extra Page deleted successfully.';
    }

    public function render()
    {
        return view('livewire.admin.extras.index', [
            'extras' => Extra::query()
                ->when($this->search, fn ($query) => $query->where('title', 'like', '%'.$this->search.'%'))
                ->latest()
                ->paginate(10),
        ]);
    }
}
