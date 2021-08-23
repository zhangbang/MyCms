<?php


namespace Modules\Shop\Http\Controllers\Admin;


use App\Http\Controllers\MyController;
use Illuminate\Http\Request;
use Modules\Shop\Http\Requests\CategoryRequest;
use Modules\Shop\Models\GoodsCategory;
use Modules\Shop\Service\CategoryService;

class CategoryController extends MyController
{


    public function index(Request $request)
    {
        if ($request->ajax() && $request->wantsJson()) {
            $category = GoodsCategory::orderBy('id', 'desc')
                ->paginate($this->request('limit', 'intval'))->toArray();

            return $this->jsonSuc($category);
        }
        return $this->view('admin.category.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(CategoryService $service)
    {
        $categories = $service->categoryTree();
        return $this->view('admin.category.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request, GoodsCategory $category)
    {
        $data = $request->validated();
        $result = $category->store($data);

        return $this->result($result);
    }

    /**
     * 编辑
     */
    public function edit(CategoryService $service)
    {
        $categories = $service->categoryTree();
        $category = GoodsCategory::find($this->request('id', 'intval'));

        return $this->view('admin.category.edit', compact('categories', 'category'));
    }

    /**
     * 更新
     */
    public function update(CategoryRequest $request, GoodsCategory $category)
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
        $result = GoodsCategory::destroy($this->request('id','intval'));
        return $this->result($result);
    }


}
