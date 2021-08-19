<?php


namespace Modules\User\Models;


use App\Models\MyModel;

class UserBalance extends MyModel
{

    protected $table = 'my_user_balance';

    public function user()
    {
        return $this->belongsTo('Modules\User\Models\User');
    }

}
