<?php

namespace App\Models;

use App\Helpers\RepositoryHelpers;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MyModel extends Model
{
    use HasFactory, RepositoryHelpers;

    public static function insert($data)
    {
        $object = new static();
        $object->store($data);

        return $object->{$object->getKeyName()};
    }

}
