<?php

/*
 * 获取页面当前标题
 */
if (!function_exists('cms_hook_the_title')) {
    function cms_hook_the_title()
    {
        $config = (new \Modules\System\Models\Config())->group('seo')->getConfig();

        if (is_single() && isset($config['seo_single_title'])) {
            return cms_single_seo_rule($config['seo_single_title']);
        }

        if (is_category() && isset($config['seo_category_title'])) {
            return cms_category_seo_rule($config['seo_category_title']);
        }

        if (is_tag() && isset($config['seo_tag_title'])) {
            return cms_tag_seo_rule($config['seo_tag_title']);
        }

        if (is_home() && isset($config['seo_site_title'])) {
            $page = request()->route()->parameter('page');
            return str_replace('{page}', ($page && $page > 1 ? " - 第{$page}页" : ""), $config['seo_site_title']);
        }

        return session('page_title') ?? false;

    }
}

/*
 * 获取页面关键词
 */
if (!function_exists('cms_hook_the_keyword')) {
    function cms_hook_the_keyword()
    {

        $config = (new \Modules\System\Models\Config())->group('seo')->getConfig();

        if (is_single() && isset($config['seo_single_keyword'])) {
            return cms_single_seo_rule($config['seo_single_keyword']);
        }

        if (is_category() && isset($config['seo_category_keyword'])) {
            return cms_category_seo_rule($config['seo_category_keyword']);
        }

        if (is_tag() && isset($config['seo_tag_keyword'])) {
            return cms_tag_seo_rule($config['seo_tag_keyword']);
        }

        if (is_home() && isset($config['seo_site_keyword'])) {
            return $config['seo_site_keyword'];
        }

        return session('page_keyword') ?? false;

    }
}


/*
 * 获取页面描述
 */
if (!function_exists('cms_hook_the_description')) {
    function cms_hook_the_description()
    {

        $config = (new \Modules\System\Models\Config())->group('seo')->getConfig();

        if (is_single() && isset($config['seo_single_description'])) {
            return cms_single_seo_rule($config['seo_single_description']);
        }

        if (is_category() && isset($config['seo_category_description'])) {
            return cms_category_seo_rule($config['seo_category_description']);
        }

        if (is_tag() && isset($config['seo_tag_description'])) {
            return cms_tag_seo_rule($config['seo_tag_description']);
        }

        if (is_home() && isset($config['seo_site_description'])) {
            return $config['seo_site_description'];
        }

        return session('page_description') ?? false;

    }
}

if (!function_exists('cms_single_seo_rule')) {
    function cms_single_seo_rule($value)
    {
        return str_replace(
            ['{name}', '{description}', '{tags}', '{category}'],
            [
                session('single')->title,
                session('single')->description,
                join(',', array_column(cms_article_tags(session('single')->id), 'tag_name')),
                session('single')->category->name,
            ],
            $value
        );
    }
}


if (!function_exists('cms_category_seo_rule')) {
    function cms_category_seo_rule($value)
    {

        $page = request()->route()->parameter('page');

        return str_replace(
            ['{name}', '{description}', '{page}'],
            [session('category')->name, session('category')->description, $page && $page > 1 ? " - 第{$page}页" : '' ],
            $value
        );
    }
}


if (!function_exists('cms_tag_seo_rule')) {
    function cms_tag_seo_rule($value)
    {
        $page = request()->route()->parameter('page');

        return str_replace(
            ['{name}', '{description}', '{page}'],
            [session('tag')->tag_name, session('tag')->description, $page && $page > 1 ? " - 第{$page}页" : ''],
            $value
        );
    }
}
