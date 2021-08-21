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
        return (new \Modules\Cms\Service\ArticleCategoryService())->childTree();
    }
}

/*
 * 获取有缩略图的文章
 */
if (!function_exists('cms_img_articles')) {
    function cms_img_articles($limit = 10)
    {
        return (new \Modules\Cms\Service\ArticleService())->newPosts($limit, true);

    }
}

/*
 * 获取最新的文章
 */
if (!function_exists('cms_new_articles')) {
    function cms_new_articles($limit = 10)
    {
        return (new \Modules\Cms\Service\ArticleService())->newPosts($limit);

    }
}

/*
 * 获取标签
 */
if (!function_exists('cms_tags')) {
    function cms_tags($limit = 10)
    {
        return \Modules\Cms\Models\ArticleTag::orderBy('id', 'desc')->paginate($limit);
    }
}

/*
 * 获取文章标签
 */
if (!function_exists('cms_article_tags')) {
    function cms_article_tags($id)
    {
        return (new \Modules\Cms\Service\ArticleService())->tags($id);
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

        return (new \Modules\Cms\Service\ArticleService())->newPosts(
            $limit,
            null,
            $child
        );
    }
}


/*
 * 获取标签文章
 */
if (!function_exists('cms_tag_articles')) {
    function cms_tag_articles($id, $limit = 10)
    {
        return (new \Modules\Cms\Service\ArticleTagService())->articles(
            $id, $limit
        );
    }
}
