<?php


namespace Modules\User\Models;


use App\Models\MyModel;

class User extends MyModel
{

    protected $table = 'my_user';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

}
