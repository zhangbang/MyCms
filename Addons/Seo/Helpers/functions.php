<?php
/**
 * SEO规则
 */
if (!function_exists("seo_rule")) {
    function seo_rule($key = '')
    {
        $config = system_config([], 'seo');
        return empty($key) ? $config : ($config[$key] ?? '');
    }
}

/**
 * 分页SEO规则
 */
if (!function_exists("seo_page_rule")) {
    function seo_page_rule(): string
    {
        $page = request()->route()->parameter('page');
        return $page && $page > 1 ? " - 第{$page}页" : '';
    }
}

/**
 * 首页SEO规则
 */
if (!function_exists("the_home_seo_rule")) {
    function the_home_seo_rule($value)
    {


        return str_replace(
            ['{page}'],
            [seo_page_rule()],
            $value
        );
    }
}

/**
 * 分类SEO规则
 */
if (!function_exists("the_category_seo_rule")) {
    function the_category_seo_rule($value)
    {
        return str_replace(
            ['{name}', '{description}', '{page}'],
            [the_category_title(), the_category_description(), seo_page_rule()],
            $value
        );
    }
}

/**
 * 文章SEO规则
 */
if (!function_exists("the_single_seo_rule")) {
    function the_single_seo_rule($value)
    {
        return str_replace(
            ['{name}', '{description}', '{tags}', '{category}', '{author}'],
            [
                the_single_title(),
                the_single_description(),
                article_tags_text(),
                the_single()->category->name,
                the_single()->author
            ],
            $value
        );
    }
}

/**
 * 标签页SEO规则
 */
if (!function_exists("the_tag_seo_rule")) {
    function the_tag_seo_rule($value)
    {
        return str_replace(
            ['{name}', '{description}', '{page}'],
            [the_tag_title(), the_tag_description(), seo_page_rule()],
            $value
        );
    }
}


/**
 * 搜索页SEO规则
 */
if (!function_exists("the_search_seo_rule")) {
    function the_search_seo_rule($value)
    {
        return str_replace(
            ['{keyword}', '{page}'],
            [the_search_title(), seo_page_rule()],
            $value
        );
    }
}


/**
 * 商品SEO规则
 */
if (!function_exists("the_goods_seo_rule")) {
    function the_goods_seo_rule($value)
    {
        return str_replace(
            ['{name}', '{description}', '{category}'],
            [
                the_goods_title(),
                the_goods_description(),
                the_goods()->category->name,
            ],
            $value
        );
    }
}


/**
 * 商品分类SEO规则
 */
if (!function_exists("the_store_category_seo_rule")) {
    function the_store_category_seo_rule($value)
    {
        return str_replace(
            ['{name}', '{description}', '{page}'],
            [the_store_category_title(), the_store_category_description(), seo_page_rule()],
            $value
        );
    }
}

/**
 * 商城首页SEO规则
 */
if (!function_exists("the_store_seo_rule")) {
    function the_store_seo_rule($value)
    {
        return str_replace(
            ['{page}'],
            [seo_page_rule()],
            $value
        );
    }
}

/**
 * 首页标题
 */
if (!function_exists("the_home_title_for_rule")) {
    function the_home_title_for_rule()
    {
        return the_home_seo_rule(seo_rule('seo_site_title'));
    }
}

/**
 * 首页关键词
 */
if (!function_exists("the_home_keyword_for_rule")) {
    function the_home_keyword_for_rule()
    {
        return the_home_seo_rule(seo_rule('seo_site_keyword'));
    }
}

/**
 * 首页描述
 */
if (!function_exists("the_home_description_for_rule")) {
    function the_home_description_for_rule()
    {
        return the_home_seo_rule(seo_rule('seo_site_description'));
    }
}


/**
 * 分类页标题
 */
if (!function_exists("the_category_title_for_rule")) {
    function the_category_title_for_rule()
    {
        return the_category_seo_rule(seo_rule('seo_category_title'));
    }
}

/**
 * 分类页关键词
 */
if (!function_exists("the_category_keyword_for_rule")) {
    function the_category_keyword_for_rule()
    {
        return the_category_seo_rule(seo_rule('seo_category_keyword'));
    }
}

/**
 * 分类页描述
 */
if (!function_exists("the_category_description_for_rule")) {
    function the_category_description_for_rule()
    {
        return the_category_seo_rule(seo_rule('seo_category_description'));
    }
}


/**
 * 文章页标题
 */
if (!function_exists("the_single_title_for_rule")) {
    function the_single_title_for_rule()
    {
        return the_single_seo_rule(seo_rule('seo_single_title'));
    }
}

/**
 * 文章页关键词
 */
if (!function_exists("the_single_keyword_for_rule")) {
    function the_single_keyword_for_rule()
    {
        return the_single_seo_rule(seo_rule('seo_single_keyword'));
    }
}

/**
 * 文章页描述
 */
if (!function_exists("the_single_description_for_rule")) {
    function the_single_description_for_rule()
    {
        return the_single_seo_rule(seo_rule('seo_single_description'));
    }
}


/**
 * 标签页标题
 */
if (!function_exists("the_tag_title_for_rule")) {
    function the_tag_title_for_rule()
    {
        return the_tag_seo_rule(seo_rule('seo_tag_title'));
    }
}

/**
 * 标签页关键词
 */
if (!function_exists("the_tag_keyword_for_rule")) {
    function the_tag_keyword_for_rule()
    {
        return the_tag_seo_rule(seo_rule('seo_tag_keyword'));
    }
}

/**
 * 标签页描述
 */
if (!function_exists("the_tag_description_for_rule")) {
    function the_tag_description_for_rule()
    {
        return the_tag_seo_rule(seo_rule('seo_tag_description'));
    }
}


/**
 * 搜索页标题
 */
if (!function_exists("the_search_title_for_rule")) {
    function the_search_title_for_rule()
    {
        return the_search_seo_rule(seo_rule('seo_search_title'));
    }
}

/**
 * 搜索页关键词
 */
if (!function_exists("the_search_keyword_for_rule")) {
    function the_search_keyword_for_rule()
    {
        return the_search_seo_rule(seo_rule('seo_search_keyword'));
    }
}

/**
 * 搜索页描述
 */
if (!function_exists("the_search_description_for_rule")) {
    function the_search_description_for_rule()
    {
        return the_search_seo_rule(seo_rule('seo_search_description'));
    }
}


/**
 * 商城首页标题
 */
if (!function_exists("the_store_title_for_rule")) {
    function the_store_title_for_rule()
    {
        return the_store_seo_rule(seo_rule('seo_store_title'));
    }
}

/**
 * 商城首页关键词
 */
if (!function_exists("the_store_keyword_for_rule")) {
    function the_store_keyword_for_rule()
    {
        return the_store_seo_rule(seo_rule('seo_store_keyword'));
    }
}

/**
 * 商城首页描述
 */
if (!function_exists("the_store_description_for_rule")) {
    function the_store_description_for_rule()
    {
        return the_store_seo_rule(seo_rule('seo_store_description'));
    }
}


/**
 * 商品页标题
 */
if (!function_exists("the_goods_title_for_rule")) {
    function the_goods_title_for_rule()
    {
        return the_goods_seo_rule(seo_rule('seo_store_goods_title'));
    }
}

/**
 * 商品页关键词
 */
if (!function_exists("the_goods_keyword_for_rule")) {
    function the_goods_keyword_for_rule()
    {
        return the_goods_seo_rule(seo_rule('seo_store_goods_keyword'));
    }
}

/**
 * 商品页描述
 */
if (!function_exists("the_goods_description_for_rule")) {
    function the_goods_description_for_rule()
    {
        return the_goods_seo_rule(seo_rule('seo_store_goods_description'));
    }
}


/**
 * 商品分类页标题
 */
if (!function_exists("the_store_category_title_for_rule")) {
    function the_store_category_title_for_rule()
    {
        return the_store_category_seo_rule(seo_rule('seo_store_category_title'));
    }
}

/**
 * 商品分类页关键词
 */
if (!function_exists("the_store_category_keyword_for_rule")) {
    function the_store_category_keyword_for_rule()
    {
        return the_store_category_seo_rule(seo_rule('seo_store_category_keyword'));
    }
}

/**
 * 商品分类页描述
 */
if (!function_exists("the_store_category_description_for_rule")) {
    function the_store_category_description_for_rule()
    {
        return the_store_category_seo_rule(seo_rule('seo_store_category_description'));
    }
}
