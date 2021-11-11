<?php


namespace Modules\Shop\Http\Controllers\Admin;


use App\Http\Controllers\MyController;
use Illuminate\Http\Request;
use Modules\Shop\Models\PayLog;

class PayController extends MyController
{

    public function logs(Request $request)
    {
        if ($request->ajax() && $request->wantsJson()) {

            $where = ['trade_type' => 'goods'];
            if ($json = $request->input('filter')) {
                $filters = json_decode($json, true);
                foreach ($filters as $name => $filter) {
                    $where[] = [$name, '=', $filter];
                }
            }

            $point = PayLog::with('user:id,name')
                ->selectRaw("*,FROM_UNIXTIME(pay_time,'%Y-%m-%d %H:%i:%s') as pay_time")
                ->where($where)
                ->orderBy('id', 'desc')
                ->paginate($this->request('limit', 'intval'))->toArray();

            return $this->jsonSuc($point);
        }

        return $this->view('admin.pay.logs');
    }

}
