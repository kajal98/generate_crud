<?php

namespace App\Livewire\Admin\Extras;

use App\Models\Extra;
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

    public Extra $extra;

    public string $title = '';
    public string $code = '';
    public string $description = '';
    public $photo;

    public function mount(?Extra $extra = null): void
    {
        $this->extra = $extra ?? new Extra;
        $extra = $this->extra;

        $this->title = (string) ($extra->title ?? '');
        $this->code = (string) ($extra->code ?? '');
        $this->description = (string) ($extra->description ?? '');
    }

    protected function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'code' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'photo' => ['nullable', 'image', 'mimes:jpg,jpeg,png,gif', 'max:10240'],
        ];
    }

    public function save()
    {
        $creating = ! $this->extra->exists;
        $validated = $this->validate();

        if ($this->photo) {
            $name = Str::random(40).'.'.$this->photo->extension();
            File::ensureDirectoryExists(public_path('tmp'));
            File::copy($this->photo->getRealPath(), upload_tmp_path($name));
            $validated['image'] = $name;
        }

        $this->extra->fill(Arr::except($validated, 'photo'))->save();

        session()->flash('success', $creating ? 'Extra Page created successfully.' : 'Extra Page updated successfully.');

        return $this->redirectRoute('extra.index');
    }

    public function render()
    {
        return view('livewire.admin.extras.form')
            ->title(($this->extra->exists ? 'Edit' : 'Add').' Extra Page');
    }
}
