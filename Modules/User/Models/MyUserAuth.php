<?php


namespace Modules\User\Models;


use App\Helpers\RepositoryHelpers;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class MyUserAuth extends Authenticatable
{
    use HasFactory, RepositoryHelpers;
}
