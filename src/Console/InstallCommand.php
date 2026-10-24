<?php

namespace KajalPandya\LaravelCrud\Console;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Composer;
use Symfony\Component\Finder\SplFileInfo;

use function Laravel\Prompts\select;

class InstallCommand extends Command
{
    protected $signature = 'crud:install
                            {stack? : The frontend stack to install (blade or livewire)}
                            {--force : Overwrite files that already exist}
                            {--composer=global : Absolute path to the Composer binary}';

    protected $description = 'Install the admin panel into your application';

    /**
     * The stacks that can be installed.
     *
     * @var array<string, string>
     */
    public const STACKS = [
        'blade' => 'Blade',
        'livewire' => 'Livewire',
    ];

    /**
     * Files that already existed and were left untouched.
     *
     * @var list<string>
     */
    protected array $skipped = [];

    public function handle(Filesystem $files, Composer $composer): int
    {
        $stack = $this->argument('stack') ?? select(
            label: 'Which stack would you like to use?',
            options: self::STACKS,
            default: $this->detectStack(),
        );

        if (! array_key_exists($stack, self::STACKS)) {
            $this->components->error("Invalid stack [{$stack}]. Choose one of: ".implode(', ', array_keys(self::STACKS)).'.');

            return self::FAILURE;
        }

        if ($stack === 'livewire' && ! class_exists(\Livewire\Livewire::class)) {
            $this->components->info('Installing livewire/livewire...');

            if (! $composer->requirePackages(['livewire/livewire:^4.0'], false, $this->output, $this->composerBinary())) {
                $this->components->error('Could not install livewire/livewire. Run `composer require livewire/livewire` and try again.');

                return self::FAILURE;
            }
        }

        $this->copyStubs($files, 'shared');
        $this->copyStubs($files, $stack);

        $this->callSilently('vendor:publish', ['--tag' => 'crud-migrations']);
        $this->callSilently('vendor:publish', ['--tag' => 'crud-assets', '--force' => true]);

        $files->ensureDirectoryExists(public_path('tmp'));
        $this->registerRoutes($files);

        if ($this->skipped !== []) {
            $this->components->warn('These files already existed and were not changed (use --force to overwrite):');
            $this->components->bulletList($this->skipped);
        }

        $this->components->info('Admin panel installed with '.self::STACKS[$stack].'.');
        $this->components->bulletList([
            'Run <comment>php artisan migrate</comment>',
            'Run <comment>php artisan db:seed --class=CrudSeeder</comment> for a demo admin and sample content',
            'Open <comment>/admin/login</comment> and sign in with admin@gmail.com / admin2018, then change the password',
        ]);

        return self::SUCCESS;
    }

    /**
     * Copy a stub directory into the application, skipping files that already exist.
     */
    protected function copyStubs(Filesystem $files, string $directory): void
    {
        $source = __DIR__.'/../../stubs/'.$directory;

        /** @var SplFileInfo $file */
        foreach ($files->allFiles($source) as $file) {
            $relative = $file->getRelativePathname();
            $target = base_path($relative);

            if ($files->exists($target) && ! $this->option('force')) {
                if ($files->get($target) !== $file->getContents()) {
                    $this->skipped[] = $relative;
                }

                continue;
            }

            $files->ensureDirectoryExists(dirname($target));
            $files->copy($file->getPathname(), $target);
        }
    }

    /**
     * Load routes/crud.php from routes/web.php.
     */
    protected function registerRoutes(Filesystem $files): void
    {
        $web = base_path('routes/web.php');
        $line = "require __DIR__.'/crud.php';";

        if (! $files->exists($web) || str_contains($files->get($web), $line)) {
            return;
        }

        $files->append($web, PHP_EOL.$line.PHP_EOL);
    }

    /**
     * Guess the stack the application already uses.
     */
    protected function detectStack(): string
    {
        return class_exists(\Livewire\Livewire::class) ? 'livewire' : 'blade';
    }

    protected function composerBinary(): ?string
    {
        $composer = $this->option('composer');

        return $composer !== 'global' ? $composer : null;
    }
}
