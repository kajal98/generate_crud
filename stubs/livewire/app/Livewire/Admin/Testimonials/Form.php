<?php

namespace App\Livewire\Admin\Testimonials;

use App\Models\Testimonial;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('admin.layouts.livewire')]
class Form extends Component
{
    public Testimonial $testimonial;

    public string $name = '';
    public string $designation = '';
    public string $text = '';
    public bool $status = false;

    public function mount(?Testimonial $testimonial = null): void
    {
        $this->testimonial = $testimonial ?? new Testimonial;
        $testimonial = $this->testimonial;

        $this->name = (string) ($testimonial->name ?? '');
        $this->designation = (string) ($testimonial->designation ?? '');
        $this->text = (string) ($testimonial->text ?? '');
        $this->status = (bool) $testimonial->status;
    }

    protected function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'designation' => ['required', 'string', 'max:255'],
            'text' => ['required', 'string'],
            'status' => ['boolean'],
        ];
    }

    public function save()
    {
        $creating = ! $this->testimonial->exists;
        $validated = $this->validate();

        $this->testimonial->fill($validated)->save();

        session()->flash('success', $creating ? 'Testimonial created successfully.' : 'Testimonial updated successfully.');

        return $this->redirectRoute('testimonial.index');
    }

    public function render()
    {
        return view('livewire.admin.testimonials.form')
            ->title(($this->testimonial->exists ? 'Edit' : 'Add').' Testimonial');
    }
}
