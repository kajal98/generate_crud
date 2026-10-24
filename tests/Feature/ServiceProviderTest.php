<?php

namespace KajalPandya\LaravelCrud\Tests\Feature;

use Illuminate\Support\Facades\Artisan;
use KajalPandya\LaravelCrud\Http\Middleware\AdminOnly;
use KajalPandya\LaravelCrud\Tests\TestCase;

class ServiceProviderTest extends TestCase
{
    public function test_config_is_merged(): void
    {
        $this->assertSame(['admin', 'super admin'], config('crud.admin_roles'));
        $this->assertFalse(config('crud.uploads.s3'));
    }

    public function test_admin_middleware_alias_is_registered(): void
    {
        $this->assertSame(AdminOnly::class, $this->app['router']->getMiddleware()['admin']);
    }

    public function test_commands_are_registered(): void
    {
        $commands = array_keys(Artisan::all());

        $this->assertContains('crud:install', $commands);
        $this->assertContains('generate:crud', $commands);
    }
}
