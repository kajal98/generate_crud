<?php
namespace Illuminate\Foundation\Console;
namespace Youcandothis\Crud\Src\Commands;
use Illuminate\Console\Command;
use Illuminate\Support\Str;
use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class GenerateCrud extends Command
{
    protected $name = 'generate:crud';

    protected $description = 'Generate crud just by add your entity name.';

    public function __construct()
    {
        parent::__construct();
    }

    public function fire()
    {
        // $option = $this->option('example');
        // print('hiiiiiiiiiiiiii');

        // $this->info('This a command test:'.$option);
    }
    
    protected function getArguments()
    {
        return [            
            ['name', InputArgument::REQUIRED, 'The name of the class'],
            ['model_name', InputArgument::OPTIONAL, 'An example argument.'],
        ];
    }

    protected function getOptions()
    {
        return [
            ['fields', 'fi', InputOption::VALUE_OPTIONAL, 'An example option.', null],
            ['all', 'a', InputOption::VALUE_NONE, 'Generate a migration, factory, and resource controller for the model'],

            ['controller', 'c', InputOption::VALUE_NONE, 'Create a new controller for the model'],

            ['factory', 'f', InputOption::VALUE_NONE, 'Create a new factory for the model'],

            ['force', null, InputOption::VALUE_NONE, 'Create the class even if the model already exists.'],

            ['migration', 'm', InputOption::VALUE_NONE, 'Create a new migration file for the model.'],

            ['pivot', 'p', InputOption::VALUE_NONE, 'Indicates if the generated model should be a custom intermediate table model.'],

            ['resource', 'r', InputOption::VALUE_NONE, 'Indicates if the generated controller should be a resource controller.'],

            ['views', 'vi', InputOption::VALUE_NONE, 'Create a views.'],
        ];


    }

    protected function getNameInput()
    {
        return trim($this->argument('name'));
    }

    protected function getNamespace($name)
    {
        return trim(implode('\\', array_slice(explode('\\', $name), 0, -1)), '\\');
    }

    protected function rootNamespace()
    {
        return $this->laravel->getNamespace();
    }
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace;
    }

    protected function qualifyClass($name)
    {
        $name = ltrim($name, '\\/');

        $rootNamespace = $this->rootNamespace();

        if (Str::startsWith($name, $rootNamespace)) {
            return $name;
        }

        $name = str_replace('/', '\\', $name);

        return $this->qualifyClass(
            $this->getDefaultNamespace(trim($rootNamespace, '\\')).'\\'.$name
        );
    }    

    protected function createFactory()
    {
        $this->call('make:factory', [
            'name' => $this->argument('name').'Factory',
            '--model' => $this->argument('name'),
        ]);
    }

    protected function createMigration()
    {
        $table = Str::plural(Str::snake(class_basename($this->argument('name'))));

        $this->call('make:migration', [
            'name' => "create_{$table}_table",
            '--create' => $table,
        ]);
    }

    protected function createController()
    {
        $controller = Str::studly(class_basename($this->argument('name')));

        $modelName = $this->qualifyClass($this->getNameInput());

        $this->call('make:controller', [
            'name' => "{$controller}Controller",
            '--model' => $this->option('resource') ? $modelName : null,
        ]);
    }

    protected function createViews()
    {
        $modelName = strtolower($this->argument('name'));

        $layout_path = 'resources/views/layouts/' . $modelName . '.blade.php';
        $index_path = 'resources/views/' . $modelName . 's/index.blade.php';
        $create_path = 'resources/views/' . $modelName . 's/create.blade.php';
        $edit_path = 'resources/views/' . $modelName . 's/edit.blade.php';
        $show_path = 'resources/views/' . $modelName . 's/show.blade.php';

        $layout_content = "<!DOCTYPE html>\n<html lang='en'>\n<head>\n    <meta charset='utf-8'>\n    <meta http-equiv='X-UA-Compatible' content='IE=edge'>\n    <meta name='viewport' content='width=device-width, initial-scale=1'>\n</head>\n<body>\n    <div id='container'>\n        @yield('content')\n    </div>\n</body>\n</html>\n";
        $view_content = "@extends('layouts." . $modelName . "')\n@section('content')\n<div class='app'>\n\n</div>\n@endsection";

            if(!file_exists('resources/views/layouts'))
                {
                    mkdir('resources/views/layouts');
                }
            file_put_contents($layout_path, $layout_content);
            $this->info('Layout Created Successfully.');

        if ($this->confirm('Would you like to create a views? [y|N]')) {
            if(!file_exists('resources/views/' . $modelName . 's'))
                {
                    mkdir('resources/views/' . $modelName . 's');
                }
            file_put_contents($index_path, $view_content);
            file_put_contents($create_path, $view_content);
            file_put_contents($edit_path, $view_content);
            file_put_contents($show_path, $view_content);
            $this->info('Views Created Successfully.');
        }

    }

    public function handle()
    {
        if ($this->option('all')) {
            $this->input->setOption('factory', true);
            $this->input->setOption('migration', true);
            $this->input->setOption('controller', true);
            $this->input->setOption('resource', true);
            $this->input->setOption('views', true);
        }

        if ($this->option('factory')) {
            $this->createFactory();
        }

        if ($this->option('migration')) {
            $this->createMigration();
        }

        if ($this->option('controller') || $this->option('resource')) {
            $this->createController();
        }

        if ($this->option('views')) {
            $this->createViews();
        }
    }

}