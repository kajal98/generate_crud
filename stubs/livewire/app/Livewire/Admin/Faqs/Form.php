<?php

namespace App\Livewire\Admin\Faqs;

use App\Models\Faq;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('admin.layouts.livewire')]
class Form extends Component
{
    public Faq $faq;

    public string $question = '';
    public string $answer = '';
    public bool $status = false;

    public function mount(?Faq $faq = null): void
    {
        $this->faq = $faq ?? new Faq;
        $faq = $this->faq;

        $this->question = (string) ($faq->question ?? '');
        $this->answer = (string) ($faq->answer ?? '');
        $this->status = (bool) $faq->status;
    }

    protected function rules(): array
    {
        return [
            'question' => ['required', 'string', 'max:255'],
            'answer' => ['required', 'string'],
            'status' => ['boolean'],
        ];
    }

    public function save()
    {
        $creating = ! $this->faq->exists;
        $validated = $this->validate();

        $this->faq->fill($validated)->save();

        session()->flash('success', $creating ? 'Faq created successfully.' : 'Faq updated successfully.');

        return $this->redirectRoute('faq.index');
    }

    public function render()
    {
        return view('livewire.admin.faqs.form')
            ->title(($this->faq->exists ? 'Edit' : 'Add').' Faq');
    }
}
