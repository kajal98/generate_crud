<?php

namespace App\Livewire\Admin;

use App\Models\SiteSetting;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('admin.layouts.livewire')]
#[Title('Site Settings')]
class SiteSettings extends Component
{
    public string $title = '';
    public string $email = '';
    public string $phone_1 = '';
    public string $phone_2 = '';
    public string $copy_right = '';
    public string $site_visitors = '';

    public ?string $message = null;

    public function mount(): void
    {
        $settings = SiteSetting::firstOrNew();

        foreach (['title', 'email', 'phone_1', 'phone_2', 'copy_right', 'site_visitors'] as $field) {
            $this->{$field} = (string) ($settings->{$field} ?? '');
        }
    }

    protected function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone_1' => ['required', 'string', 'max:255'],
            'phone_2' => ['required', 'string', 'max:255'],
            'copy_right' => ['required', 'string', 'max:255'],
            'site_visitors' => ['required', 'integer', 'min:0'],
        ];
    }

    public function save(): void
    {
        SiteSetting::firstOrNew()->fill($this->validate())->save();

        $this->message = 'Settings saved successfully.';
    }

    public function render()
    {
        return view('livewire.admin.site-settings');
    }
}
