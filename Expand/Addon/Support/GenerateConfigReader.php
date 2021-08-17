<?php


namespace Expand\Addon\Support;


use Nwidart\Modules\Support\Config\GeneratorPath;

class GenerateConfigReader
{
    public static function read(string $value) : GeneratorPath
    {
        return new GeneratorPath(config("addon.paths.generator.$value"));
    }
}
