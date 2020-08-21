<?php

namespace LNCHUK\LaravelExtendedResource\Commands;

use Illuminate\Routing\Console\ControllerMakeCommand;
use Symfony\Component\Console\Input\InputOption;

class ExtendedControllerMakeCommand extends ControllerMakeCommand
{
    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        $stub = null;

        if ($this->option('extended-resource')) {
            $stub = '/stubs/controller.extended.stub';
        } elseif ($this->option('extended-resource') && $this->option('model')) {
            $stub = '/stubs/controller.extended-model.stub';
        }

        return $stub !== null
            ? $this->resolveStubPath($stub)
            : parent::getStub();
    }

    /**
     * Resolve the fully-qualified path to the stub.
     *
     * @param  string  $stub
     * @return string
     */
    protected function resolveStubPath($stub)
    {
        return file_exists(__DIR__.$stub)
            ? __DIR__.$stub
            : parent::resolveStubPath($stub);
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        $extendedResourceOption = [
            ['extended-resource', 'e', InputOption::VALUE_NONE,
                'Generate an extended resource controller class.']
        ];

        return array_merge(parent::getOptions(), $extendedResourceOption);
    }
}
