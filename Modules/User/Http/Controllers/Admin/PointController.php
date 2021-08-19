<?php


namespace Modules\User\Http\Controllers\Admin;


use App\Http\Controllers\MyController;
use Illuminate\Http\Request;
use Modules\User\Models\UserPoint;

class PointController extends MyController
{

    public function index(Request $request)
    {
        if ($request->ajax() && $request->wantsJson()) {
            $admins = UserPoint::with(['user:id,name'])->orderBy('id', 'desc')
                ->paginate($this->request('limit', 'intval'))->toArray();

            return $this->jsonSuc($admins);
        }
        return $this->view('admin.balance.index');
    }

}
