<?php


namespace Modules\Shop\Http\Controllers\Admin;


use App\Http\Controllers\MyController;
use Illuminate\Http\Request;
use Modules\Shop\Http\Requests\GoodsRequest;
use Modules\Shop\Models\Goods;
use Modules\Shop\Service\CategoryService;

class GoodsController extends MyController
{

    public function index(Request $request)
    {
        if ($request->ajax() && $request->wantsJson()) {

            $where = [];
            if ($json = $request->input('filter')) {
                $filters = json_decode($json, true);
                foreach ($filters as $name => $filter) {
                    $where[] = [$name, $name == 'goods_name' ? 'like' : '=', $name == 'goods_name' ? "%{$filter}%" : $filter];
                }
            }

            $goods = Goods::with('category:id,name')->orderBy('id', 'desc')
                ->where($where)
                ->paginate($this->request('limit', 'intval'))->toArray();

            return $this->jsonSuc($goods);
        }
        return $this->view('admin.goods.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = app('store')->categoryTree();
        return $this->view('admin.goods.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GoodsRequest $request, Goods $category)
    {
        $data = $request->validated();
        $result = $category->store($data);

        return $this->result($result);
    }

    /**
     * 编辑
     */
    public function edit()
    {
        $categories = app('store')->categoryTree();
        $goods = Goods::find($this->request('id', 'intval'));

        return $this->view('admin.goods.edit', compact('categories', 'goods'));
    }

    /**
     * 更新
     */
    public function update(GoodsRequest $request, Goods $category)
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
        $result = Goods::destroy($this->request('id','intval'));
        return $this->result($result);
    }


}
