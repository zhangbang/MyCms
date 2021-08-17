<?php


namespace Expand\Addon;


use Expand\Addon\Activator\AddonActivatorInterface;
use Expand\Addon\Repository\AddonFileRepository;
use Expand\Addon\Support\AddonStub;
use Expand\Addon\Support\GenerateConfigReader;
use Illuminate\Config\Repository as Config;
use Illuminate\Console\Command as Console;
use Illuminate\Filesystem\Filesystem;
use Nwidart\Modules\Contracts\ActivatorInterface;
use Nwidart\Modules\Generators\ModuleGenerator;

class Generator extends ModuleGenerator
{
    /**
     * The constructor.
     * @param $name
     * @param AddonFileRepository|null $addon
     * @param Config|null $config
     * @param Filesystem|null $filesystem
     * @param Console|null $console
     * @param AddonActivatorInterface|null $activator
     */
    public function __construct(
        $name,
        AddonFileRepository $addon = null,
        Config $config = null,
        Filesystem $filesystem = null,
        Console $console = null,
        AddonActivatorInterface $activator = null
    ) {
        $this->name = $name;
        $this->config = $config;
        $this->filesystem = $filesystem;
        $this->console = $console;
        $this->module = $addon;
        $this->activator = $activator;
    }


    /**
     * Generate the module.
     */
    public function generate() : int
    {
        $name = $this->getName();

        if ($this->module->has($name)) {
            if ($this->force) {
                $this->module->delete($name);
            } else {
                $this->console->error("Addon [{$name}] already exist!");

                return E_ERROR;
            }
        }

        $this->generateFolders();

        $this->generateAddonJsonFile();

        if ($this->type !== 'plain') {
            $this->generateFiles();
            //$this->generateResources();
        }

        //$this->activator->setActiveByName($name, $this->isActive);

        $this->console->info("Addon [{$name}] created successfully.");

        return 0;
    }

    /**
     * Generate the addon.json file
     */
    private function generateAddonJsonFile()
    {
        $path = $this->module->getModulePath($this->getName()) . 'addon.json';

        if (!$this->filesystem->isDirectory($dir = dirname($path))) {
            $this->filesystem->makeDirectory($dir, 0775, true);
        }

        $this->filesystem->put($path, $this->getStubContents('json'));

        $this->console->info("Created : {$path}");
    }

    /**
     * Get the contents of the specified stub file by given stub name.
     *
     * @param $stub
     *
     * @return string
     */
    protected function getStubContents($stub)
    {
        return (new AddonStub(
            '/' . $stub . '.stub',
            $this->getReplacement($stub)
        )
        )->render();
    }

    /**
     * Generate the folders.
     */
    public function generateFolders()
    {
        foreach ($this->getFolders() as $key => $folder) {
            $folder = GenerateConfigReader::read($key);

            if ($folder->generate() === false) {
                continue;
            }

            $path = $this->module->getModulePath($this->getName()) . '/' . $folder->getPath();

            $this->filesystem->makeDirectory($path, 0755, true);
            if (config('addon.stubs.gitkeep')) {
                $this->generateGitKeep($path);
            }
        }
    }

}
