<?php


namespace Expand\Addon\Providers;


use Expand\Addon\Commands\AddonMakeCommand;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class AddonGeneratorProvider extends ServiceProvider
{

    /**
     * Namespace of the console commands
     * @var string
     */
    protected $consoleNamespace = "Expand\\Addon\\Commands";


    /**
     * The available commands
     * @var array
     */
    protected $commands = [
        AddonMakeCommand::class,
    ];


    public function register(): void
    {
        $this->commands($this->resolveCommands());
    }

    private function resolveCommands(): array
    {
        $commands = [];

        foreach (config('addon.commands', $this->commands) as $command) {
            $commands[] = Str::contains($command, $this->consoleNamespace) ?
                $command :
                $this->consoleNamespace . "\\" . $command;
        }

        return $commands;
    }

    public function provides(): array
    {
        return $this->commands;
    }
}
