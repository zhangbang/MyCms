<?php


namespace Modules\User\Http\Controllers\Admin;


use App\Http\Controllers\MyController;
use Illuminate\Http\Request;
use Modules\User\Models\UserBalance;

class BalanceController extends MyController
{

    public function index(Request $request)
    {
        if ($request->ajax() && $request->wantsJson()) {
            $balance = UserBalance::with(['user:id,name'])->orderBy('id', 'desc')
                ->paginate($this->request('limit', 'intval'))->toArray();

            return $this->jsonSuc($balance);
        }
        return $this->view('admin.balance.index');
    }

}
