<?php


namespace Modules\User\Models;


use App\Models\MyModel;

class UserPoint extends MyModel
{

    protected $table = 'my_user_point';

    public function user()
    {
        return $this->belongsTo('Modules\User\Models\User');
    }

}
