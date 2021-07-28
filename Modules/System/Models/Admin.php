<?php


namespace Modules\System\Models;

use App\Helpers\RepositoryHelpers;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class Admin extends Authenticatable
{

    use Notifiable,RepositoryHelpers;

    protected $table = "my_system_admin";


    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role()
    {
        return $this->hasOne('Modules\System\Models\Role', 'id', 'role_id');
    }

    public function permission()
    {
        if (in_array(\request()->path(),json_decode($this->role->role_node ?: "[]",true))) {
            return true;
        }

        return false;
    }
}
