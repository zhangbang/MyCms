<?php


namespace Addons\Ads\Controllers;


use Addons\Ads\Models\Ads;
use Addons\Ads\Requests\AdsRequest;
use App\Http\Controllers\MyController;
use Illuminate\Http\Request;

class AdsController extends MyController
{

    public function index(Request $request)
    {
        if ($request->ajax() && $request->wantsJson()) {
            $ads = Ads::orderBy('id', 'desc')
                ->paginate($this->request('limit', 'intval'))->toArray();

            return $this->jsonSuc($ads);
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
    public function store(AdsRequest $request, Ads $ads)
    {
        $data = $request->validated();
        $result = $ads->store($data);

        return $this->result($result);
    }

    /**
     * 编辑
     */
    public function edit()
    {
        $ad = Ads::find($this->request('id', 'intval'));

        return $this->view('admin.edit', compact('ad'));
    }

    /**
     * 更新
     */
    public function update(AdsRequest $request, Ads $link)
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
        $result = Ads::destroy($this->request('id','intval'));
        return $this->result($result);
    }

    /**
     * 预览
     */
    public function review()
    {
        $ad = Ads::find($this->request('id', 'intval'));

        return $this->view('admin.review', compact('ad'));
    }

}
