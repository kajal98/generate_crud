<?php

namespace App\Livewire\Admin\Users;

use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('admin.layouts.livewire')]
#[Title('Users')]
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
        User::whereNotIn('role', config('crud.admin_roles'))->findOrFail($id)->delete();

        $this->message = 'User deleted successfully.';
    }

    public function toggle(int $id): void
    {
        $user = User::findOrFail($id);
        $user->active = $user->active ? 0 : 1;
        $user->save();

        $status = $user->active ? 'approved' : 'deactivated';

        if (view()->exists('emails.switch_status')) {
            Mail::send('emails.switch_status', ['data' => $user, 'status' => $status], function ($message) use ($user, $status) {
                $message->to($user->email);
                $message->subject('Your account has been '.$status);
            });
        }

        if ($user->active) {
            send_message('Your account is active now. Welcome aboard!', $user->phone);
        }

        $this->message = 'Status updated successfully.';
    }

    public function render()
    {
        return view('livewire.admin.users.index', [
            'users' => User::query()
                ->whereNotIn('role', config('crud.admin_roles'))
                ->when($this->search, fn ($query) => $query->where(function ($query) {
                    $query->where('name', 'like', '%'.$this->search.'%')
                        ->orWhere('email', 'like', '%'.$this->search.'%');
                }))
                ->orderBy('name')
                ->paginate(10),
        ]);
    }
}
