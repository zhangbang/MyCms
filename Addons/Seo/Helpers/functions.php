<?php

/*
 * 获取页面当前标题
 */
if (!function_exists('cms_hook_the_title')) {
    function cms_hook_the_title()
    {
        $config = (new \Modules\System\Models\Config())->group('seo')->getConfig();

        if (is_single()) {
            return cms_single_seo_rule($config['seo_single_title']);
        }

        if (is_category()) {
            return cms_single_seo_rule($config['seo_category_title']);
        }

        if (is_tag()) {
            return cms_tag_seo_rule($config['seo_tag_title']);
        }

        if (is_home()) {
            return $config['seo_site_title'];
        }
    }
}

/*
 * 获取页面关键词
 */
if (!function_exists('cms_hook_the_keyword')) {
    function cms_hook_the_keyword()
    {

        $config = (new \Modules\System\Models\Config())->group('seo')->getConfig();

        if (is_single()) {
            return cms_single_seo_rule($config['seo_single_keyword']);
        }

        if (is_category()) {
            return cms_single_seo_rule($config['seo_category_keyword']);
        }

        if (is_tag()) {
            return cms_tag_seo_rule($config['seo_tag_keyword']);
        }

        if (is_home()) {
            return $config['seo_site_keyword'];
        }

    }
}


/*
 * 获取页面描述
 */
if (!function_exists('cms_hook_the_description')) {
    function cms_hook_the_description()
    {

        $config = (new \Modules\System\Models\Config())->group('seo')->getConfig();

        if (is_single()) {
            return cms_single_seo_rule($config['seo_single_description']);
        }

        if (is_category()) {
            return cms_category_seo_rule($config['seo_category_description']);
        }

        if (is_tag()) {
            return cms_tag_seo_rule($config['seo_tag_description']);
        }

        if (is_home()) {
            return $config['seo_site_description'];
        }

    }
}

if (!function_exists('cms_single_seo_rule')) {
    function cms_single_seo_rule($value)
    {
        return str_replace(
            ['{name}', '{description}', '{tags}'],
            [
                session('single')->title,
                session('single')->description,
                join(',', array_column(cms_article_tags(session('single')->id),'tag_name'))
            ],
            $value
        );
    }
}


if (!function_exists('cms_category_seo_rule')) {
    function cms_category_seo_rule($value)
    {
        return str_replace(
            ['{name}', '{description}'],
            [session('category')->name, session('category')->description],
            $value
        );
    }
}


if (!function_exists('cms_tag_seo_rule')) {
    function cms_tag_seo_rule($value)
    {
        return str_replace(
            ['{name}', '{description}'],
            [session('tag')->tag_name, session('tag')->description],
            $value
        );
    }
}
