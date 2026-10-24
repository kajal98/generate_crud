<?php

namespace App\Livewire\Admin\Feedback;

use App\Models\Feedback;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('admin.layouts.livewire')]
#[Title('Feedback')]
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
        Feedback::findOrFail($id)->delete();

        $this->message = 'Feedback deleted successfully.';
    }

    public function toggle(int $id): void
    {
        $feedback = Feedback::findOrFail($id);
        $feedback->status = $feedback->status ? 0 : 1;
        $feedback->save();

        $this->message = 'Status updated successfully.';
    }

    public function render()
    {
        return view('livewire.admin.feedback.index', [
            'feedbackItems' => Feedback::query()
                ->when($this->search, fn ($query) => $query->where('name', 'like', '%'.$this->search.'%'))
                ->latest()
                ->paginate(10),
        ]);
    }
}
