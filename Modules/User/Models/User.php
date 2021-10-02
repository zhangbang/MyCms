<?php


namespace Modules\User\Models;


class User extends MyUserAuth
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
