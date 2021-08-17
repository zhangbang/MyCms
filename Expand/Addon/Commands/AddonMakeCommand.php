<?php


namespace Expand\Addon\Commands;


use Expand\Addon\Activator\AddonActivatorInterface;
use Expand\Addon\Generator;
use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputArgument;

class AddonMakeCommand extends Command
{

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'addon:make';


    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new addon';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $names = $this->argument('ident');
        $success = true;
        foreach ($names as $name) {
            $code = with(new Generator($name))
                ->setFilesystem($this->laravel['files'])
                ->setModule($this->laravel['addons'])
                ->setConfig($this->laravel['config'])
                ->setConsole($this)
                ->generate();

            if ($code === E_ERROR) {
                $success = false;
            }
        }

        return $success ? 0 : E_ERROR;
    }


    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments(): array
    {
        return [
            ['ident', InputArgument::IS_ARRAY, 'The names of addon will be created.'],
        ];
    }

}
