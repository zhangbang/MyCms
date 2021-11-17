<?php

use Modules\Cms\Models\Article;
use Modules\Cms\Models\ArticleCategory;
use Modules\Cms\Models\ArticleTag;
use Modules\Shop\Models\Goods;
use Modules\Shop\Models\GoodsCategory;

/**
 * 页面
 */
if (!function_exists('is_page')) {
    function is_page($data, $tag): bool
    {
        if ($data === false) {
            return session('the_page') === $tag;
        }

        session([$tag => $data]);
        session(['the_page' => $tag]);

        return false;
    }
}

/**
 * 文章页
 */
if (!function_exists('is_single')) {
    function is_single($single = false): bool
    {
        return is_page($single,'single');
    }
}

/**
 * 分类页
 */
if (!function_exists('is_category')) {
    function is_category($category = false): bool
    {
        return is_page($category,'category');
    }
}

/**
 * 标签页
 */
if (!function_exists('is_tag')) {
    function is_tag($tag = false): bool
    {
        return is_page($tag,'tag');
    }
}

/**
 * 首页
 */
if (!function_exists('is_home')) {
    function is_home($home = false): bool
    {
        return is_page($home,'home');
    }
}

/**
 * 搜索页
 */
if (!function_exists('is_search')) {
    function is_search($keyword = false): bool
    {
        return is_page($keyword,'search');
    }
}

/**
 * 商品页
 */
if (!function_exists('is_goods')) {
    function is_goods($goods = false): bool
    {
        return is_page($goods,'goods');
    }
}

/**
 * 商城首页
 */
if (!function_exists('is_store')) {
    function is_store($store = false): bool
    {
        return is_page($store,'store');
    }
}

/**
 * 商城分类页
 */
if (!function_exists('is_store_category')) {
    function is_store_category($category = false): bool
    {
        return is_page($category,'store_category');
    }
}



/**
 * 当前页面标识
 */
if (!function_exists('the_page')) {
    function the_page()
    {
        return session('the_page');
    }
}

/**
 * 当前页面ID
 */
if (!function_exists('the_page_id')) {
    function the_page_id()
    {
        if (function_exists("the_" . the_page())) {
            return call_user_func("the_" . the_page())->id ?? false;
        }
        return false;
    }
}

/**
 * 首页数据
 */
if (!function_exists('the_home')) {
    function the_home(): array
    {
        return session('home');
    }
}

/**
 * 首页标题
 */
if (!function_exists('the_home_title')) {
    function the_home_title()
    {
        return the_home()['site_name'];
    }
}

/**
 * 首页关键词
 */
if (!function_exists('the_home_keyword')) {
    function the_home_keyword()
    {
        return the_home()['site_name'];
    }
}

/**
 * 首页描述
 */
if (!function_exists('the_home_description')) {
    function the_home_description()
    {
        return the_home()['site_name'];
    }
}

/**
 * 当前文章数据
 */
if (!function_exists('the_single')) {
    function the_single(): Article
    {
        return session('single');
    }
}

/**
 * 当前文章标题
 */
if (!function_exists('the_single_title')) {
    function the_single_title()
    {
        return the_single()->getAttribute('title');
    }
}


/**
 * 当前文章关键词
 */
if (!function_exists('the_single_keyword')) {
    function the_single_keyword()
    {
        return the_single()->getAttribute('title');
    }
}

/**
 * 当前文章描述
 */
if (!function_exists('the_single_description')) {
    function the_single_description()
    {
        return the_single()->getAttribute('description');
    }
}


/**
 * 当前分类数据
 */
if (!function_exists('the_category')) {
    function the_category(): ArticleCategory
    {
        return session('category');
    }
}

/**
 * 当前分类标题
 */
if (!function_exists('the_category_title')) {
    function the_category_title()
    {
        return the_category()->getAttribute('name');
    }
}


/**
 * 当前分类关键词
 */
if (!function_exists('the_category_keyword')) {
    function the_category_keyword()
    {
        return the_category()->getAttribute('name');
    }
}

/**
 * 当前分类描述
 */
if (!function_exists('the_category_description')) {
    function the_category_description()
    {
        return the_category()->getAttribute('description');
    }
}


/**
 * 当前标签数据
 */
if (!function_exists('the_tag')) {
    function the_tag(): ArticleTag
    {
        return session('tag');
    }
}

/**
 * 当前标签标题
 */
if (!function_exists('the_tag_title')) {
    function the_tag_title()
    {
        return the_tag()->getAttribute('tag_name');
    }
}


/**
 * 当前标签关键词
 */
if (!function_exists('the_tag_keyword')) {
    function the_tag_keyword()
    {
        return the_tag()->getAttribute('tag_name');
    }
}

/**
 * 当前标签描述
 */
if (!function_exists('the_tag_description')) {
    function the_tag_description()
    {
        return the_tag()->getAttribute('description');
    }
}


/**
 * 当前搜索数据
 */
if (!function_exists('the_search')) {
    function the_search(): string
    {
        return session('search');
    }
}

/**
 * 当前搜索标题
 */
if (!function_exists('the_search_title')) {
    function the_search_title(): string
    {
        return the_search();
    }
}


/**
 * 当前搜索关键词
 */
if (!function_exists('the_search_keyword')) {
    function the_search_keyword(): string
    {
        return the_search();
    }
}

/**
 * 当前搜索描述
 */
if (!function_exists('the_search_description')) {
    function the_search_description(): string
    {
        return the_search();
    }
}


/**
 * 当前商品数据
 */
if (!function_exists('the_goods')) {
    function the_goods(): Goods
    {
        return session('goods');
    }
}

/**
 * 当前商品标题
 */
if (!function_exists('the_goods_title')) {
    function the_goods_title()
    {
        return the_goods()->getAttribute('goods_name');
    }
}


/**
 * 当前商品关键词
 */
if (!function_exists('the_goods_keyword')) {
    function the_goods_keyword()
    {
        return the_goods()->getAttribute('goods_name');
    }
}

/**
 * 当前商品描述
 */
if (!function_exists('the_goods_description')) {
    function the_goods_description()
    {
        return the_goods()->getAttribute('description');
    }
}


/**
 * 当前商品分类数据
 */
if (!function_exists('the_store_category')) {
    function the_store_category(): GoodsCategory
    {
        return session('store_category');
    }
}

/**
 * 当前商品分类标题
 */
if (!function_exists('the_store_category_title')) {
    function the_store_category_title()
    {
        return the_store_category()->getAttribute('name');
    }
}


/**
 * 当前商品分类关键词
 */
if (!function_exists('the_store_category_keyword')) {
    function the_store_category_keyword()
    {
        return the_store_category()->getAttribute('name');
    }
}

/**
 * 当前商品分类描述
 */
if (!function_exists('the_store_category_description')) {
    function the_store_category_description()
    {
        return the_store_category()->getAttribute('description');
    }
}

/**
 * 文章链接
 */
if (!function_exists('single_path')) {
    function single_path($id)
    {
        $path = route('cms.single', $id);
        return pipeline_func($path, 'single_path');
    }
}


/**
 * 文章链接
 */
if (!function_exists('category_path')) {
    function category_path($id)
    {
        $path = route('cms.category', $id);
        return pipeline_func($path, 'category_path');
    }
}

/**
 * 商品分类链接
 */
if (!function_exists('store_category_path')) {
    function store_category_path($id): string
    {
        $path = route('store.category', ['cid' => $id]);
        return pipeline_func($path, 'store_category_path');
    }
}

/**
 * 商品链接
 */
if (!function_exists('goods_path')) {
    function goods_path($id): string
    {
        $path = route('store.goods', $id);

        return pipeline_func($path, 'goods_path');

    }
}

/**
 * 商城链接
 */
if (!function_exists('store_path')) {
    function store_path(): string
    {
        $path = route('store.index');
        return pipeline_func($path, 'store_path');
    }
}

/**
 * 标签链接
 */
if (!function_exists('tag_path')) {
    function tag_path($id): string
    {
        $path = route('cms.tag', $id);
        return pipeline_func($path, 'tag_path');
    }
}


/**
 * 用户登录链接
 */
if (!function_exists('user_login_path')) {
    function user_login_path(): string
    {
        $path = route('user.login');
        return pipeline_func($path, 'user_login_path');
    }
}

/**
 * 用户注册链接
 */
if (!function_exists('user_reg_path')) {
    function user_reg_path(): string
    {
        $path = route('user.reg');
        return pipeline_func($path, 'user_reg_path');
    }
}

/**
 * 用户注册验证链接
 */
if (!function_exists('user_reg_code_path')) {
    function user_reg_code_path(): string
    {
        $path = route('user.reg.code');
        return pipeline_func($path, 'user_reg_code_path');
    }
}

/**
 * 用户忘记密码链接
 */
if (!function_exists('user_forget_path')) {
    function user_forget_path(): string
    {
        $path = route('user.forget');
        return pipeline_func($path, 'user_forget_path');
    }
}

/**
 * 用户退出登录链接
 */
if (!function_exists('user_logout_path')) {
    function user_logout_path(): string
    {
        $path = route('user.logout');
        return pipeline_func($path, 'user_logout_path');
    }
}

/**
 * 会员中心链接
 */
if (!function_exists('user_index_path')) {
    function user_index_path(): string
    {
        $path = route('user.index');
        return pipeline_func($path, 'user_index_path');
    }
}

/**
 * 首页链接
 */
if (!function_exists('home_path')) {
    function home_path(): string
    {
        $config = system_config();
        $path = $config['site_home_theme'] == 'cms' ? '/' : route('cms.index');

        return pipeline_func($path, 'home_path');
    }
}

/**
 * 文章评论链接
 */
if (!function_exists('single_comment_create_path')) {
    function single_comment_create_path(): string
    {
        $path = route('cms.single.comment.create');
        return pipeline_func($path, 'single_comment_create_path');
    }
}


/**
 * 分页
 */
if (!function_exists('page_path')) {
    function page_path($page, $option = [])
    {
        $path = preg_replace("/page\/[0-9]+/", "", request()->path());
        $url = "/" . trim($path, "/");

        foreach ($option as $key => $value) {
            $url .= "{$key}/$value/";
        }

        $url .= strlen($url) == 1 ? "page/{$page}" : "/page/{$page}";

        return pipeline_func($url, 'page_path');
    }
}
