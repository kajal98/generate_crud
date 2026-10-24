<?php

namespace App\Livewire\Admin\Blogs;

use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Layout('admin.layouts.livewire')]
class Form extends Component
{
    use WithFileUploads;

    public Blog $blog;

    public string $title = '';
    public string $blog_category_id = '';
    public string $author = '';
    public string $description = '';
    public $photo;
    public string $meta_title = '';
    public string $meta_keyword = '';
    public string $meta_description = '';
    public bool $publish = false;
    public bool $is_archive = false;

    public function mount(?Blog $blog = null): void
    {
        $this->blog = $blog ?? new Blog;
        $blog = $this->blog;

        $this->title = (string) ($blog->title ?? '');
        $this->blog_category_id = (string) ($blog->blog_category_id ?? '');
        $this->author = (string) ($blog->author ?? '');
        $this->description = (string) ($blog->description ?? '');
        $this->meta_title = (string) ($blog->meta_title ?? '');
        $this->meta_keyword = (string) ($blog->meta_keyword ?? '');
        $this->meta_description = (string) ($blog->meta_description ?? '');
        $this->publish = (bool) $blog->publish;
        $this->is_archive = (bool) $blog->is_archive;
    }

    protected function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'blog_category_id' => ['required', 'exists:blog_categories,id'],
            'author' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'photo' => ['nullable', 'image', 'mimes:jpg,jpeg,png,gif', 'max:10240'],
            'meta_title' => ['nullable', 'string'],
            'meta_keyword' => ['nullable', 'string'],
            'meta_description' => ['nullable', 'string'],
            'publish' => ['boolean'],
            'is_archive' => ['boolean'],
        ];
    }

    public function save()
    {
        $creating = ! $this->blog->exists;
        $validated = $this->validate();

        if ($this->photo) {
            $name = Str::random(40).'.'.$this->photo->extension();
            File::ensureDirectoryExists(public_path('tmp'));
            File::copy($this->photo->getRealPath(), upload_tmp_path($name));
            $validated['image'] = $name;
        }

        $this->blog->fill(Arr::except($validated, 'photo'))->save();

        session()->flash('success', $creating ? 'Blog created successfully.' : 'Blog updated successfully.');

        return $this->redirectRoute('blogs.index');
    }

    public function render()
    {
        return view('livewire.admin.blogs.form', [
            'categories' => BlogCategory::orderBy('name')->get(),
        ])
            ->title(($this->blog->exists ? 'Edit' : 'Add').' Blog');
    }
}
