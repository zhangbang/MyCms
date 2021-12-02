<?php


namespace Modules\Cms\Http\Controllers\Admin;


use App\Http\Controllers\MyController;
use Illuminate\Http\Request;
use Modules\Cms\Http\Requests\ArticleCategoryRequest;
use Modules\Cms\Models\ArticleCategory;
use Modules\Cms\Models\ArticleCategoryMeta;

class ArticleCategoryController extends MyController
{

    public function index(Request $request)
    {
        if ($request->ajax() && $request->wantsJson()) {
            $category = ArticleCategory::orderBy('id', 'desc')
                ->paginate($this->request('limit', 'intval'))->toArray();

            return $this->jsonSuc($category);
        }
        return $this->view('admin.category.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = app('cms')->categoryTreeForSelect();
        return $this->view('admin.category.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArticleCategoryRequest $request, ArticleCategory $category)
    {
        $data = $request->validated();

        $result = $category->store($data);

        if ($result) {

            $this->updateMeta($category->id);
        }

        return $this->result($result, ['title' => $data['name'], 'id' => $category->id]);
    }

    /**
     * 编辑
     */
    public function edit()
    {
        $id = $this->request('id', 'intval');

        $categories = app('cms')->categoryTreeForSelect();
        $category = ArticleCategory::find($id);

        $meta = app('cms')->categoryMeta($id, ['apply_to_category', 'apply_to_article', 'title']);

        return $this->view('admin.category.edit', compact('categories', 'category', 'meta'));
    }

    /**
     * 更新
     */
    public function update(ArticleCategoryRequest $request, ArticleCategory $category)
    {

        if ($id = $this->request('id', 'intval')) {

            $data = $request->validated();
            $data['id'] = $id;

            $result = $category->up($data);

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
        $result = ArticleCategory::destroy($this->request('id', 'intval'));
        return $this->result($result);
    }

    /**
     * 应用到文章的拓展
     */
    public function metaToArticle()
    {

        $meta = [];
        $result = false;

        if ($id = $this->request('id')) {

            $result = true;
            $metaArray = app('cms')->categoryMeta($id, ['template', 'apply_to_category'])->toArray();

            if (!in_array('apply_to_article', array_column($metaArray, 'meta_key'))) {
                $meta = [];
            } else {
                foreach ($metaArray as $item) {
                    if ($item['meta_key'] != 'apply_to_article') {
                        $meta[] = $item;
                    }
                }
            }
        }

        return $this->result($result, ['data' => $meta]);
    }

    /**
     * 更新分类拓展
     * @param $id
     */
    protected function updateMeta($id)
    {

        $category = ArticleCategory::find($id);
        $attr = $this->request('attr');

        if ($applyCategory = $this->request('apply_to_category')) {
            $attr['ident'][] = 'apply_to_category';
            $attr['value'][] = $applyCategory;
        }

        if ($applyArticle = $this->request('apply_to_article')) {
            $attr['ident'][] = 'apply_to_article';
            $attr['value'][] = $applyArticle;
        }

        if ($category->pid > 0 && $category->parent->apply_to_category) {

            $parentMeta = app('cms')->categoryMeta($category->pid, ['apply_to_category', 'apply_to_article']);

            foreach ($parentMeta as $value) {

                if (!in_array($value->meta_key, $attr['ident'])) {

                    $attr['ident'][] = $value->meta_key;
                    $attr['value'][] = $value->meta_value;
                }
            }

        }

        ArticleCategoryMeta::where('category_id', $id)->delete();

        foreach ($attr['ident'] as $key => $ident) {

            if ($ident) {

                $meta = [
                    'category_id' => $id,
                    'meta_key' => $ident,
                    'meta_value' => $attr['value'][$key],
                ];

                (new ArticleCategoryMeta)->store($meta);
            }
        }
    }


}
