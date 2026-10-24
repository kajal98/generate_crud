<?php

namespace KajalPandya\LaravelCrud\Tests;

use Illuminate\Filesystem\Filesystem;
use KajalPandya\LaravelCrud\CrudServiceProvider;
use Livewire\LivewireServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

abstract class TestCase extends Orchestra
{
    protected ?string $sandbox = null;

    /**
     * Run every test against a throwaway copy of the Testbench skeleton,
     * so crud:install can write files without touching vendor/.
     */
    protected function getApplicationBasePath()
    {
        if ($this->sandbox === null) {
            $files = new Filesystem;
            $this->sandbox = sys_get_temp_dir().'/crud-tests-'.bin2hex(random_bytes(6));
            $files->copyDirectory(parent::getApplicationBasePath(), $this->sandbox);
            $files->ensureDirectoryExists($this->sandbox.'/routes');
            $files->put($this->sandbox.'/routes/web.php', "<?php\n\nuse Illuminate\\Support\\Facades\\Route;\n");
        }

        return $this->sandbox;
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        if ($this->sandbox !== null) {
            (new Filesystem)->deleteDirectory($this->sandbox);
        }
    }

    protected function defineEnvironment($app)
    {
        $app['config']->set('app.key', 'base64:'.base64_encode(random_bytes(32)));
    }

    protected function getPackageProviders($app)
    {
        return [
            LivewireServiceProvider::class,
            CrudServiceProvider::class,
        ];
    }
}
