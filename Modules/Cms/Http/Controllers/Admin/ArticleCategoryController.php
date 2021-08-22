<?php


namespace Modules\Cms\Http\Controllers\Admin;


use App\Http\Controllers\MyController;
use Illuminate\Http\Request;
use Modules\Cms\Http\Requests\ArticleCategoryRequest;
use Modules\Cms\Models\ArticleCategory;
use Modules\Cms\Service\ArticleCategoryService;

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
    public function create(ArticleCategoryService $service)
    {
        $categories = $service->categoryTree();
        return $this->view('admin.category.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArticleCategoryRequest $request, ArticleCategory $category)
    {
        $data = $request->validated();

        $result = $category->store($data);

        return $this->result($result);
    }

    /**
     * 编辑
     */
    public function edit(ArticleCategoryService $service)
    {
        $categories = $service->categoryTree();
        $category = ArticleCategory::find($this->request('id', 'intval'));

        return $this->view('admin.category.edit', compact('categories', 'category'));
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

            return $this->result($result);
        }

        return $this->result(false);
    }

    /**
     * 删除
     */
    public function destroy()
    {
        $result = ArticleCategory::destroy($this->request('id','intval'));
        return $this->result($result);
    }

}