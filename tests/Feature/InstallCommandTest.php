<?php

namespace KajalPandya\LaravelCrud\Tests\Feature;

use KajalPandya\LaravelCrud\Tests\TestCase;

class InstallCommandTest extends TestCase
{
    public function test_blade_stack_is_installed(): void
    {
        $this->artisan('crud:install', ['stack' => 'blade'])
            ->expectsOutputToContain('Admin panel installed with Blade.')
            ->assertSuccessful();

        $this->assertFileExists(app_path('Http/Controllers/Admin/UsersController.php'));
        $this->assertFileExists(app_path('Http/Controllers/Admin/UploadController.php'));
        $this->assertFileExists(resource_path('views/admin/users/index.blade.php'));
        $this->assertFileDoesNotExist(app_path('Livewire/Admin/Dashboard.php'));
        $this->assertSharedFilesInstalled();
    }

    public function test_livewire_stack_is_installed(): void
    {
        $this->artisan('crud:install', ['stack' => 'livewire'])
            ->expectsOutputToContain('Admin panel installed with Livewire.')
            ->assertSuccessful();

        $this->assertFileExists(app_path('Livewire/Admin/Dashboard.php'));
        $this->assertFileExists(app_path('Livewire/Admin/Users/Form.php'));
        $this->assertFileExists(resource_path('views/livewire/admin/users/index.blade.php'));
        $this->assertFileExists(resource_path('views/admin/layouts/livewire.blade.php'));
        $this->assertFileDoesNotExist(app_path('Http/Controllers/Admin/UsersController.php'));
        $this->assertStringContainsString('Route::livewire', file_get_contents(base_path('routes/crud.php')));
        $this->assertSharedFilesInstalled();
    }

    public function test_the_stack_can_be_picked_from_a_prompt(): void
    {
        $this->artisan('crud:install')
            ->expectsChoice('Which stack would you like to use?', 'livewire', ['blade' => 'Blade', 'livewire' => 'Livewire'])
            ->assertSuccessful();

        $this->assertFileExists(app_path('Livewire/Admin/Dashboard.php'));
    }

    public function test_an_unknown_stack_fails(): void
    {
        $this->artisan('crud:install', ['stack' => 'svelte'])
            ->expectsOutputToContain('Invalid stack [svelte]')
            ->assertFailed();
    }

    public function test_changed_files_are_kept_unless_forced(): void
    {
        $this->artisan('crud:install', ['stack' => 'blade'])->assertSuccessful();

        $model = app_path('Models/Faq.php');
        file_put_contents($model, '<?php // customised');

        $this->artisan('crud:install', ['stack' => 'blade'])
            ->expectsOutputToContain('app/Models/Faq.php')
            ->assertSuccessful();
        $this->assertSame('<?php // customised', file_get_contents($model));

        $this->artisan('crud:install', ['stack' => 'blade', '--force' => true])->assertSuccessful();
        $this->assertStringContainsString('class Faq extends Model', file_get_contents($model));
    }

    public function test_install_is_idempotent(): void
    {
        $this->artisan('crud:install', ['stack' => 'blade'])->assertSuccessful();
        $this->artisan('crud:install', ['stack' => 'blade'])
            ->doesntExpectOutputToContain('already existed')
            ->assertSuccessful();

        $this->assertSame(1, substr_count(file_get_contents(base_path('routes/web.php')), "require __DIR__.'/crud.php';"));
        $this->assertCount(9, glob(database_path('migrations/*.php')));
    }

    protected function assertSharedFilesInstalled(): void
    {
        $this->assertFileExists(app_path('Models/Blog.php'));
        $this->assertFileExists(database_path('seeders/CrudSeeder.php'));
        $this->assertFileExists(resource_path('views/admin/layouts/panel.blade.php'));
        $this->assertFileExists(public_path('vendor/crud/css/admin.css'));
        $this->assertDirectoryExists(public_path('tmp'));
        $this->assertStringContainsString("require __DIR__.'/crud.php';", file_get_contents(base_path('routes/web.php')));

        $migrations = array_map('basename', glob(database_path('migrations/*.php')));
        $this->assertCount(9, $migrations);
        $categories = array_search(true, array_map(fn ($m) => str_contains($m, 'create_blog_categories_table'), $migrations));
        $blogs = array_search(true, array_map(fn ($m) => str_contains($m, 'create_blogs_table'), $migrations));
        $this->assertLessThan($blogs, $categories, 'blog_categories must migrate before blogs');
    }
}
