<?php

namespace KajalPandya\LaravelCrud\Tests\Feature;

use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Route;
use KajalPandya\LaravelCrud\Tests\TestCase;

class AdminOnlyTest extends TestCase
{
    protected function defineRoutes($router): void
    {
        Route::get('admin/login', fn () => 'login')->name('admin.login');
        Route::middleware(['web', 'admin'])->get('admin', fn () => 'dashboard');
    }

    protected function user(string $role): User
    {
        return (new User)->forceFill(['id' => 1, 'role' => $role]);
    }

    public function test_guests_are_sent_to_the_admin_login(): void
    {
        $this->get('admin')->assertRedirect(route('admin.login'));
    }

    public function test_non_admins_are_turned_away(): void
    {
        $this->actingAs($this->user('user'))->get('admin')->assertRedirect('/');
    }

    public function test_admin_roles_from_config_are_allowed(): void
    {
        $this->actingAs($this->user('admin'))->get('admin')->assertOk()->assertSee('dashboard');

        config(['crud.admin_roles' => ['editor']]);
        $this->actingAs($this->user('editor'))->get('admin')->assertOk();
        $this->actingAs($this->user('admin'))->get('admin')->assertRedirect('/');
    }
}
