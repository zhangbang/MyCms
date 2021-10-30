<?php


namespace Modules\Cms\Http\Controllers\Admin;


use App\Http\Controllers\MyController;
use Illuminate\Http\Request;
use Modules\Cms\Http\Requests\ArticleTagRequest;
use Modules\Cms\Models\ArticleTag;

class ArticleTagController extends MyController
{
    public function index(Request $request)
    {
        if ($request->ajax() && $request->wantsJson()) {

            $where = [];
            if ($json = $request->input('filter')) {
                $filters = json_decode($json, true);
                foreach ($filters as $name => $filter) {
                    $where[] = [$name, $name == 'tag_name' ? 'like' : '=', $name == 'tag_name' ? "%{$filter}%" : $filter];
                }
            }

            $tags = ArticleTag::orderBy('id', 'desc')
                ->where($where)
                ->paginate($this->request('limit', 'intval'))->toArray();

            return $this->jsonSuc($tags);
        }
        return $this->view('admin.tag.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->view('admin.tag.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArticleTagRequest $request, ArticleTag $tag)
    {
        $data = $request->validated();

        $row = ArticleTag::where('tag_name', $data['tag_name'])->first();

        if (!$row) {
            $result = $tag->store($data);
            return $this->result($result, ['title' => $data['tag_name'], 'id' => $tag->id]);
        }

        return $this->result(false, ['msg' => '该标签已存在']);
    }

    /**
     * 编辑
     */
    public function edit()
    {
        $tag = ArticleTag::find($this->request('id', 'intval'));

        return $this->view('admin.tag.edit', compact('tag'));
    }

    /**
     * 更新
     */
    public function update(ArticleTagRequest $request, ArticleTag $tag)
    {

        if ($id = $this->request('id', 'intval')) {

            $data = $request->validated();
            $data['id'] = $id;

            $result = $tag->up($data);

            return $this->result($result);
        }

        return $this->result(false);
    }

    /**
     * 删除
     */
    public function destroy()
    {
        $result = ArticleTag::destroy($this->request('id', 'intval'));
        return $this->result($result);
    }
}
