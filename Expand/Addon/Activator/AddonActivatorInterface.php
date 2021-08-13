<?php


namespace Expand\Addon\Activator;


use Expand\Addon\Addon;
use Nwidart\Modules\Contracts\ActivatorInterface;

interface AddonActivatorInterface extends ActivatorInterface
{
    public function hasStatusForAddon(Addon $addon, bool $status): bool;
}
