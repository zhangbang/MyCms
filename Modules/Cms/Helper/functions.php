<?php

/*
 * 获取CMS首页地址
 */
if (!function_exists('cms_home_path')) {
    function cms_home_path(): string
    {
        return '/';

    }
}

/*
 * 获取CMS分类
 */
if (!function_exists('cms_categories')) {
    function cms_categories()
    {
        $values = (new \Modules\Cms\Service\ArticleCategoryService())->childTree();

        return cms_hook_call('cms_hook_categories', $values);
    }
}

/*
 * 获取有缩略图的文章
 */
if (!function_exists('cms_img_articles')) {
    function cms_img_articles($limit = 10)
    {
        $values = (new \Modules\Cms\Service\ArticleService())->newPosts($limit, true);

        return cms_hook_call('cms_hook_img_articles', $values);
    }
}

/*
 * 获取最新的文章
 */
if (!function_exists('cms_new_articles')) {
    function cms_new_articles($limit = 10)
    {
        $values = (new \Modules\Cms\Service\ArticleService())->newPosts($limit);

        return cms_hook_call('cms_hook_new_articles', $values);
    }
}

/*
 * 获取标签
 */
if (!function_exists('cms_tags')) {
    function cms_tags($limit = 10)
    {
        $values = \Modules\Cms\Models\ArticleTag::orderBy('id', 'desc')->paginate($limit);

        return cms_hook_call('cms_hook_tags', $values);
    }
}

/*
 * 获取文章标签
 */
if (!function_exists('cms_article_tags')) {
    function cms_article_tags($id)
    {
        $values = (new \Modules\Cms\Service\ArticleService())->tags($id);

        return cms_hook_call('cms_hook_article_tags', $values);
    }
}

/*
 * 获取分类文章
 */
if (!function_exists('cms_category_articles')) {
    function cms_category_articles($id, $limit = 10)
    {
        $child = (new \Modules\Cms\Service\ArticleCategoryService())->childIds([], $id);
        $child[] = $id;

        $values = (new \Modules\Cms\Service\ArticleService())->newPosts(
            $limit,
            null,
            $child
        );

        return cms_hook_call('cms_hook_category_articles', $values);
    }
}


/*
 * 获取标签文章
 */
if (!function_exists('cms_tag_articles')) {
    function cms_tag_articles($id, $limit = 10)
    {
        $values = (new \Modules\Cms\Service\ArticleTagService())->articles(
            $id, $limit
        );

        return cms_hook_call('cms_hook_tag_articles', $values);
    }
}

/*
 * 获取页面当前标题
 */
if (!function_exists('cms_the_title')) {
    function cms_the_title()
    {
        if (is_single()) {
            return session('single')->title;
        }

        if (is_category()) {
            return session('category')->name;
        }

        if (is_home()) {
            return session('home')['site_name'];
        }

        return cms_hook_call('cms_hook_the_title', (new \Modules\System\Models\Config())->getConfig(['site_name'])['site_name']);
    }
}

/*
 * 获取页面关键词
 */
if (!function_exists('cms_the_keyword')) {
    function cms_the_keyword()
    {
        if (is_single()) {
            return session('single')->title;
        }

        if (is_category()) {
            return session('category')->name;
        }

        if (is_home()) {
            return session('home')['site_name'];
        }

        return cms_hook_call('cms_hook_the_keyword', (new \Modules\System\Models\Config())->getConfig(['site_name'])['site_name']);
    }
}


/*
 * 获取页面关键词
 */
if (!function_exists('cms_the_description')) {
    function cms_the_description()
    {
        if (is_single()) {
            return session('single')->description;
        }

        if (is_category()) {
            return session('category')->description;
        }

        if (is_home()) {
            return session('home')['site_name'];
        }

        return cms_hook_call('cms_hook_the_description', (new \Modules\System\Models\Config())->getConfig(['site_name'])['site_name']);
    }
}


/*
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
 * 调用插件自定义函数
 */
if (!function_exists('cms_hook_call')) {
    function cms_hook_call($name, $value)
    {
        if (function_exists($name)) {
            return call_user_func($name);
        }

        return $value;
    }
}