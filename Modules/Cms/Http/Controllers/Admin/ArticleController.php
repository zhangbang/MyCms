<?php


namespace Modules\Cms\Http\Controllers\Admin;


use App\Http\Controllers\MyController;
use Illuminate\Http\Request;
use Modules\Cms\Http\Requests\ArticleRequest;
use Modules\Cms\Models\Article;
use Modules\Cms\Models\ArticleMeta;
use Modules\Cms\Models\ArticleTag;
use Modules\Cms\Models\ArticleTagRel;

class ArticleController extends MyController
{

    public function index(Request $request)
    {
        if ($request->ajax() && $request->wantsJson()) {

            $where = [];
            if ($json = $request->input('filter')) {
                $filters = json_decode($json, true);
                foreach ($filters as $name => $filter) {
                    $where[] = [$name, $name == 'title' ? 'like' : '=', $name == 'title' ? "%{$filter}%" : $filter];
                }
            }

            $category = Article::with('category:id,name')->orderBy('id', 'desc')
                ->where($where)
                ->paginate($this->request('limit', 'intval'))->toArray();

            return $this->jsonSuc($category);
        }
        return $this->view('admin.article.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = app('cms')->categoryTreeForSelect();
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

        if ($result) {

            $this->updateMeta($article->id);
        }

        return $this->result($result, ['id' => $article->id, 'title' => $article->title, 'url' => single_path($article->id)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function edit()
    {
        $id = $this->request('id', 'intval');
        $categories = app('cms')->categoryTreeForSelect();

        $article = Article::find($id);
        $tags = article_tags_text($id);

        $meta = app('cms')->articleMeta($id);

        return $this->view('admin.article.edit', compact('categories', 'article', 'tags', 'meta'));
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

            if ($result) {

                $this->updateMeta($id);
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


    public function tags()
    {
        $id = $this->request('id', 'intval');
        $tags = article_tags_text($id);
        $article = Article::find($id);

        return $this->view('admin.article.tags', compact('article', 'tags'));
    }

    public function tagStore(ArticleTag $tag, ArticleTagRel $tagRel)
    {
        if ($id = $this->request('id', 'intval')) {
            $tags = $this->request('tags');
            $tagIds = $tag->insert(explode(",", $tags));
            $tagRel->insertRel($id, $tagIds);

            return $this->result($tagIds ?? false);
        }

        return $this->result(false);
    }

    protected function updateMeta($id)
    {
        $attr = $this->request('attr');
        ArticleMeta::where('article_id', $id)->delete();

        foreach ($attr['ident'] as $key => $ident) {

            if ($ident) {

                $meta = [
                    'article_id' => $id,
                    'meta_key' => $ident,
                    'meta_value' => $attr['value'][$key],
                ];

                (new ArticleMeta)->store($meta);
            }

        }
    }
}
