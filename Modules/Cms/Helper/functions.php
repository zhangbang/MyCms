<?php

/*
 * 获取CMS首页地址
 */

use Modules\Cms\Models\Article;

if (!function_exists('cms_home_path')) {
    function cms_home_path(): string
    {

        $config = system_config();
        if ($config['site_home_theme'] == 'cms') {
            return '/';
        }

        return route('cms.index');
    }
}

/**
 * 获取CMS文章地址
 */
if (!function_exists('cms_single_path')) {
    function cms_single_path($id): string
    {
        $value = route('cms.single', $id);

        return cms_hook_call('cms_hook_single_path', $value, $id);

    }
}

/**
 * 获取CMS分类地址
 */
if (!function_exists('cms_category_path')) {
    function cms_category_path($id): string
    {
        $value = route('cms.category', $id);

        return cms_hook_call('cms_hook_category_path', $value, $id);

    }
}

/**
 * 获取CMS Tag地址
 */
if (!function_exists('cms_tag_path')) {
    function cms_tag_path($id): string
    {
        $value = route('cms.tag', $id);

        return cms_hook_call('cms_hook_tag_path', $value, $id);

    }
}

/**
 * 获取CMS分类
 */
if (!function_exists('cms_categories')) {
    function cms_categories()
    {
        $values = app('articleCategory')->childTree();

        return cms_hook_call('cms_hook_categories', $values);
    }
}

/**
 * 获取有缩略图的文章
 */
if (!function_exists('cms_img_articles')) {
    function cms_img_articles($limit = 10)
    {
        $values = app('article')->newPosts($limit, true);

        return cms_hook_call('cms_hook_img_articles', $values);
    }
}

/**
 * 获取最新的文章
 */
if (!function_exists('cms_new_articles')) {
    function cms_new_articles($limit = 10)
    {

        $values = app('article')->newPosts($limit);

        return cms_hook_call('cms_hook_new_articles', $values);
    }
}

/**
 * 获取标签
 */
if (!function_exists('cms_tags')) {
    function cms_tags($limit = 10)
    {
        $values = app('articleTag')->newTags($limit);

        return cms_hook_call('cms_hook_tags', $values);
    }
}

/**
 * 获取文章标签
 */
if (!function_exists('cms_article_tags')) {
    function cms_article_tags($id)
    {
        $values = app('article')->tags($id);

        return cms_hook_call('cms_hook_article_tags', $values);
    }
}

/**
 * 获取分类文章
 */
if (!function_exists('cms_category_articles')) {
    function cms_category_articles($id, $limit = 10)
    {
        $child = app('articleCategory')->childIds([], $id, true);

        $values = app('article')->newPosts($limit, null, $child);

        return cms_hook_call('cms_hook_category_articles', $values);
    }
}


/**
 * 获取标签文章
 */
if (!function_exists('cms_tag_articles')) {
    function cms_tag_articles($id, $limit = 10)
    {
        $values = app('articleTag')->articles($id, $limit);

        return cms_hook_call('cms_hook_tag_articles', $values);
    }
}

/**
 * 获取页面当前标题
 */
if (!function_exists('cms_the_title')) {
    function cms_the_title()
    {
        $value = session('page_title');

        $page = request()->route()->parameter('page');

        if (is_single()) {
            $value = session('single')->title;
        }

        if (is_goods()) {
            $value = session('goods')->goods_name;
        }

        if (is_store_category()) {
            $value = session('store_category')->name;
        }

        if (is_category()) {
            $value = session('category')->name;
        }

        if (is_tag()) {
            $value = session('tag')->name;
        }

        if (is_home()) {
            $value = session('home')['site_name'];
        }

        if (is_search()) {
            $value = session('search') . ":搜索结果";
        }

        $value .= $page && $page > 1 ? " - 第{$page}页" : '';

        return cms_hook_call('cms_hook_the_title', $value);
    }
}

/**
 * 获取页面关键词
 */
if (!function_exists('cms_the_keyword')) {
    function cms_the_keyword()
    {

        $value = session('page_keyword');

        if (is_single()) {
            $value = session('single')->title;
        }

        if (is_goods()) {
            $value = session('goods')->goods_name;
        }

        if (is_store_category()) {
            $value = session('store_category')->name;
        }

        if (is_category()) {
            $value = session('category')->name;
        }

        if (is_tag()) {
            $value = session('tag')->name;
        }

        if (is_home()) {
            $value = session('home')['site_name'];
        }

        if (is_search()) {
            $value = session('search');
        }

        return cms_hook_call('cms_hook_the_keyword', $value);
    }
}


/**
 * 获取页面描述
 */
if (!function_exists('cms_the_description')) {
    function cms_the_description()
    {

        $value = session('page_description');

        if (is_single()) {
            $value = session('single')->description;
        }

        if (is_goods()) {
            $value = session('goods')->description;
        }

        if (is_store_category()) {
            $value = session('store_category')->description;
        }

        if (is_category()) {
            $value = session('category')->description;
        }

        if (is_tag()) {
            $value = session('tag')->description;
        }

        if (is_home()) {
            $value = session('home')['site_name'];
        }

        if (is_search()) {
            $value = session('search') . ":搜索结果";
        }

        return cms_hook_call('cms_hook_the_description', $value);
    }
}


/**
 * 文章页
 */
if (!function_exists('is_single')) {
    function is_single($single = false): bool
    {
        if ($single === false) {
            return session('the_page') === 'single';
        }

        session(['single' => $single]);
        session(['the_page' => 'single']);

        return false;
    }
}

/*
 * 分类页
 */
if (!function_exists('is_category')) {
    function is_category($category = false): bool
    {
        if ($category === false) {
            return session('the_page') === 'category';
        }

        session(['category' => $category]);
        session(['the_page' => 'category']);

        return false;
    }
}

/*
 * 标签页
 */
if (!function_exists('is_tag')) {
    function is_tag($tag = false): bool
    {
        if ($tag === false) {
            return session('the_page') === 'tag';
        }

        session(['tag' => $tag]);
        session(['the_page' => 'tag']);

        return false;
    }
}

/*
 * 首页
 */
if (!function_exists('is_home')) {
    function is_home($home = false): bool
    {
        if ($home === false) {
            return session('the_page') === 'home';
        }

        session(['home' => $home]);
        session(['the_page' => 'home']);

        return false;
    }
}

/*
 * 搜索页
 */
if (!function_exists('is_search')) {
    function is_search($keyword = false): bool
    {
        if ($keyword === false) {
            return session('the_page') === 'search';
        }

        session(['search' => $keyword]);
        session(['the_page' => 'search']);

        return false;
    }
}

/*
 * 获取友情链接
 */
if (!function_exists('friend_link')) {
    function friend_link()
    {
        return cms_hook_call('hook_friend_link', []);
    }
}

/*
 * 调用插件自定义函数
 */
if (!function_exists('cms_hook_call')) {
    function cms_hook_call($name, $value, $param = null)
    {
        if (function_exists($name)) {
            return ($param === null ? call_user_func($name) : call_user_func($name, $param)) ?: $value;
        }

        return $value;
    }
}


/*
 * 分页
 */
if (!function_exists('cms_page_url')) {
    function cms_page_url($page, $option = [])
    {
        $path = preg_replace("/page\/[0-9]+/", "", request()->path());
        $url = "/" . trim($path, "/");

        foreach ($option as $key => $value) {
            $url .= "{$key}/$value/";
        }

        $url .= strlen($url) == 1 ? "page/{$page}" : "/page/{$page}";

        return cms_hook_call('cms_hook_page_url', $url);
    }
}


/*
 * 扫描系统内模板
 */
if (!function_exists('cms_themes')) {
    function cms_themes(): array
    {
        $directories = \Illuminate\Support\Facades\Storage::disk('root')
            ->directories('Template');

        return array_map(function ($item) {
            if (file_exists(base_path($item . '/theme.json'))) {
                $info = \Illuminate\Support\Facades\Storage::disk('root')
                    ->get($item . '/theme.json');
                return json_decode($info, true);
            }
        }, $directories);
    }
}


/*
 * 搜索
 */
if (!function_exists('cms_search')) {
    function cms_search($keyword, $limit = 10)
    {
        $page = request()->route()->parameter('page');

        return Article::with("category:id,name")
            ->orderBy('id', 'desc')
            ->where('title', 'like', '%' . $keyword . '%')
            ->paginate($limit, '*', 'page', $page);
    }
}

/*
 * 获取指定排序的文章
 */
if (!function_exists('cms_sort_articles')) {
    function cms_sort_articles($field = 'id', $orderBy = 'desc', $categoryId = [], $limit = 10)
    {
        $page = request()->route()->parameter('page');
        $whereRaw = $categoryId ? "  category_id in(" . join(",", $categoryId) . ")" : '1=1';

        $values = Article::with('category:id,name')
            ->orderBy($field, $orderBy)
            ->whereRaw($whereRaw)
            ->paginate($limit, '*', 'page', $page);

        return cms_hook_call('cms_hook_sort_articles', $values);
    }
}

if (!function_exists('created_at_date')) {
    function created_at_date($dateTime, $format = 'Y-m-d')
    {
        return date($format, strtotime($dateTime));
    }
}
