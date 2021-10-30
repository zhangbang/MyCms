<?php


namespace Modules\Cms\Http\Controllers\Web;


use App\Helpers\ViewHelpers;
use App\Http\Controllers\MyController;
use Modules\Cms\Models\Article;
use Modules\Cms\Models\ArticleCategory;
use Modules\Cms\Models\ArticleTag;

class CmsController extends MyController
{

    use ViewHelpers;

    public function index()
    {
        is_home(system_config());

        return $this->theme('index');
    }

    public function category($id)
    {
        $category = ArticleCategory::find($id);

        if (empty($category)) {
            abort(404);
        }

        is_category($category);

        return $this->theme('category', compact('category'));
    }

    public function single($id)
    {
        $article = Article::with("category:id,name")->find($id);

        if (empty($article)) {
            abort(404);
        }

        is_single($article);

        return $this->theme('single', compact('article'));
    }


    public function tag($id)
    {
        $tag = ArticleTag::find($id);

        if (empty($tag)) {
            abort(404);
        }

        is_tag($tag);

        return $this->theme('tag', compact('tag'));
    }

    public function search($keyword)
    {
        $keyword = $this->filter($keyword, '');

        is_search($keyword);

        return $this->theme('search', compact('keyword'));
    }
}
