<?php

namespace Youcandothis\Crud\Src\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;

class GenerateCrud extends Command
{
    protected $signature = 'generate:crud
                            {name : The name of the entity}
                            {--vi|views : Create the layout and views}';

    protected $description = 'Generate crud just by add your entity name.';

    public function handle(Filesystem $files): int
    {
        if ($this->option('views')) {
            $this->createViews($files);
        }

        return self::SUCCESS;
    }

    protected function createViews(Filesystem $files): void
    {
        $modelName = Str::lower(trim($this->argument('name')));
        $viewsDir = resource_path('views/'.$modelName.'s');
        $layoutPath = resource_path('views/layouts/'.$modelName.'.blade.php');

        $layoutContent = "<!DOCTYPE html>\n<html lang='en'>\n<head>\n    <meta charset='utf-8'>\n    <meta http-equiv='X-UA-Compatible' content='IE=edge'>\n    <meta name='viewport' content='width=device-width, initial-scale=1'>\n</head>\n<body>\n    <div id='container'>\n        @yield('content')\n    </div>\n</body>\n</html>\n";
        $viewContent = "@extends('layouts.".$modelName."')\n@section('content')\n<div class='app'>\n\n</div>\n@endsection";

        $files->ensureDirectoryExists(dirname($layoutPath));
        $files->put($layoutPath, $layoutContent);
        $this->info('Layout Created Successfully.');

        if ($this->confirm('Would you like to create a views?')) {
            $files->ensureDirectoryExists($viewsDir);
            foreach (['index', 'create', 'edit', 'show'] as $view) {
                $files->put($viewsDir.'/'.$view.'.blade.php', $viewContent);
            }
            $this->info('Views Created Successfully.');
        }
    }
}
