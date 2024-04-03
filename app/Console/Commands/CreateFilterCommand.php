<?php

namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;

class CreateFilterCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'make:filter';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new filter class';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Filter';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return  app_path() . '\Console\Stubs\filter.default.stub';
    }

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Http\Filters';
    }

    /**
     * Build the class with the given name.
     *
     * @param  string  $name
     * @return string
     */
    protected function buildClass($name)
    {
        $replace = [
            '{{ class }}' => $name,
        ];
        return str_replace(array_keys($replace), array_values($replace), parent::buildClass($name));
    }
}
