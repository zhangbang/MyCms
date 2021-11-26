<?php


namespace Addons\Nav\Service;


use Addons\Nav\Models\Nav;
use App\Service\MyService;

class NavService extends MyService
{
    public function categoryTree(): array
    {
        return $this->treeForSelect(Nav::toTree());
    }

    public function childTree($pid = 0): array
    {
        return $this->tree(Nav::toTree(), $pid);

    }
}
