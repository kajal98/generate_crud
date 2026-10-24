<?php

namespace App\Livewire\Admin\BlogCategories;

use App\Models\BlogCategory;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('admin.layouts.livewire')]
class Form extends Component
{
    public BlogCategory $blogCategory;

    public string $name = '';

    public function mount(?BlogCategory $blogCategory = null): void
    {
        $this->blogCategory = $blogCategory ?? new BlogCategory;
        $blogCategory = $this->blogCategory;

        $this->name = (string) ($blogCategory->name ?? '');
    }

    protected function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
        ];
    }

    public function save()
    {
        $creating = ! $this->blogCategory->exists;
        $validated = $this->validate();

        $this->blogCategory->fill($validated)->save();

        session()->flash('success', $creating ? 'Blog Category created successfully.' : 'Blog Category updated successfully.');

        return $this->redirectRoute('blog_categories.index');
    }

    public function render()
    {
        return view('livewire.admin.blog-categories.form')
            ->title(($this->blogCategory->exists ? 'Edit' : 'Add').' Blog Category');
    }
}
