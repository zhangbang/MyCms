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
        $categories = app('cms')->categoryTree();
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

        $categories = app('cms')->categoryTree();
        $category = ArticleCategory::find($id);

        $meta = ArticleCategoryMeta::where('category_id', $id)->get();

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

    protected function updateMeta($id)
    {
        $attr = $this->request('attr');
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
