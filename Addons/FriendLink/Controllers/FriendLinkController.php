<?php


namespace Addons\FriendLink\Controllers;


use Addons\FriendLink\Models\FriendLink;
use Addons\FriendLink\Requests\FriendLinkRequest;
use App\Http\Controllers\MyController;
use Illuminate\Http\Request;

class FriendLinkController extends MyController
{

    public function index(Request $request)
    {
        if ($request->ajax() && $request->wantsJson()) {
            $category = FriendLink::orderBy('id', 'desc')
                ->paginate($this->request('limit', 'intval'))->toArray();

            return $this->jsonSuc($category);
        }

        return $this->view('admin.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FriendLinkRequest $request, FriendLink $friendLink)
    {
        $data = $request->validated();

        $result = $friendLink->store($data);

        return $this->result($result);
    }

    /**
     * 编辑
     */
    public function edit()
    {
        $link = FriendLink::find($this->request('id', 'intval'));

        return $this->view('admin.edit', compact('link'));
    }

    /**
     * 更新
     */
    public function update(FriendLinkRequest $request, FriendLink $link)
    {

        if ($id = $this->request('id', 'intval')) {

            $data = $request->validated();
            $data['id'] = $id;

            $result = $link->up($data);

            return $this->result($result);
        }

        return $this->result(false);
    }


    /**
     * 删除
     */
    public function destroy()
    {
        $result = FriendLink::destroy($this->request('id','intval'));
        return $this->result($result);
    }

}
