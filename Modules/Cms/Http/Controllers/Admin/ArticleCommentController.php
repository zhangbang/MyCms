<?php


namespace Modules\Cms\Http\Controllers\Admin;


use App\Http\Controllers\MyController;
use Illuminate\Http\Request;
use Modules\Cms\Models\ArticleComment;

class ArticleCommentController extends MyController
{
    public function index(Request $request)
    {
        if ($request->ajax() && $request->wantsJson()) {
            $category = ArticleComment::with(['user:id,name','article:id,title'])
                ->orderBy('id', 'desc')
                ->paginate($this->request('limit', 'intval'))->toArray();

            return $this->jsonSuc($category);
        }
        return $this->view('admin.comment.index');
    }

    public function config()
    {
        $config = system_config([], 'cms');
        return $this->view('admin.comment.config', compact('config'));
    }

    public function storeCfg()
    {
        $data = [
            'is_allow_comment' => $this->request('is_allow_comment', 'intval'),
            'is_auto_status' => $this->request('is_auto_status', 'intval'),
        ];

        $result = system_config_store($data, 'cms');

        return $this->result($result);
    }

    public function destroy()
    {
        $result = ArticleComment::destroy($this->request('id', 'intval'));
        return $this->result($result);
    }

    public function modify()
    {
        $admin = ArticleComment::find($this->request('id', 'intval'));
        $admin->{$this->request('field')} = $this->request('value');
        $result = $admin->save();

        return $this->result($result);
    }
}
