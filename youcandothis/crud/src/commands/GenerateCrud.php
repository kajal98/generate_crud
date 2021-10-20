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
        if ($this->option('views')) {
            $this->createViews();
        }
    }

}