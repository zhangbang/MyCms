<?php


namespace Modules\Shop\Models;


use App\Models\MyModel;

class PayLog extends MyModel
{
    protected $table = 'my_pay_log';

    public function user()
    {
        return $this->hasOne('Modules\User\Models\User', 'id', 'user_id');
    }
}
