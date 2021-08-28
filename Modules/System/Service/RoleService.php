<?php


namespace Modules\System\Service;


use Illuminate\Support\Facades\Route;

class RoleService
{

    protected $nodes = [];
    protected $tree = [];

    protected function roleNode()
    {
        $routes = Route::getRoutes()->get();

        collect($routes)->each(function ($route) use (&$nodes) {
            if (in_array('admin.auth', $route->middleware())) {
                list($module, $group) = explode('/', $route->uri());
                $nodes[$module][$group][] = $route->uri();
            }
        });

        return $nodes;
    }

    public function toTree($roleNodes, $nodes = [], $rootId = 1, $parentKey = '')
    {

        $nodes = $nodes ?: $this->roleNode();

        if (is_array($nodes)) {

            $nodes = is_string(array_values($nodes)[0]) ? array_values(array_unique($nodes)) : $nodes;

            return array_map(function ($item, $key) use ($rootId, $parentKey, $roleNodes) {

                return [
                    'title' => $this->nodeTitle($item, $parentKey, $key),
                    'type' => $rootId,
                    'spread' => true,
                    'children' => $this->toTree($roleNodes, $item, ($rootId + 1), $key),
                    'id' => is_string($item) ? $item : '',
                    'field' => is_string($item) ? 'nodes[]' : '',
                    'checked' => is_string($item) && in_array($item, $roleNodes)
                ];
            }, $nodes, array_keys($nodes));
        }

    }

    protected function nodeTitle($item, $parentKey, $key)
    {
        $config = array_merge(config('role'), (config('role_ext') ?? []));

        if (is_string($item)) {
            $title = $config[$item] ?? $item;
        } else {
            $title = empty($parentKey)
                ? $config[$key]
                : (
                    $config["{$parentKey}.{$key}"] ?? "{$parentKey}.{$key}"
                );
        }

        return $title;
    }
}
