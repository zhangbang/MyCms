<?php


namespace Modules\Cms\Http\Controllers\Admin;


use App\Http\Controllers\MyController;
use Illuminate\Http\Request;
use Modules\Cms\Http\Requests\ArticleRequest;
use Modules\Cms\Models\Article;
use Modules\Cms\Models\ArticleTag;
use Modules\Cms\Models\ArticleTagRel;
use Modules\Cms\Service\ArticleCategoryService;
use Modules\Cms\Service\ArticleService;

class ArticleController extends MyController
{

    public function index(Request $request)
    {
        if ($request->ajax() && $request->wantsJson()) {
            $category = Article::with('category:id,name')->orderBy('id', 'desc')
                ->paginate($this->request('limit', 'intval'))->toArray();

            return $this->jsonSuc($category);
        }
        return $this->view('admin.article.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(ArticleCategoryService $service)
    {
        $categories = $service->categoryTree();
        return $this->view('admin.article.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArticleRequest $request, Article $article, ArticleTag $tag, ArticleTagRel $tagRel)
    {
        $data = $request->validated();
        $result = $article->store($data);

        if ($result !== false && $tags = $this->request('tags')) {
            $tagIds = $tag->insert(explode(",", $tags));
            $tagRel->insertRel($article->id, $tagIds);
        }

        return $this->result($result, ['id' => $article->id, 'url' => cms_single_path($article->id)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function edit(ArticleCategoryService $service, ArticleService $articleService)
    {
        $id = $this->request('id', 'intval');
        $categories = $service->categoryTree();
        $article = Article::find($id);
        $tags = $articleService->tagsText($id);
        return $this->view('admin.article.edit', compact('categories', 'article', 'tags'));
    }


    /**
     * 更新
     */
    public function update(ArticleRequest $request, Article $article, ArticleTag $tag, ArticleTagRel $tagRel)
    {

        if ($id = $this->request('id', 'intval')) {

            $data = $request->validated();
            $data['id'] = $id;

            $result = $article->up($data);

            if ($result !== false && $tags = $this->request('tags')) {
                $tagIds = $tag->insert(explode(",", $tags));
                $tagRel->insertRel($id, $tagIds);
            }

            return $this->result($result);
        }

        return $this->result(false);
    }

    /**
     * 删除
     */
    public function destroy()
    {
        $result = Article::destroy($this->request('id', 'intval'));
        return $this->result($result);
    }
}
