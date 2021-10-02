<?php

use Illuminate\Support\Facades\Hash;
use Modules\User\Models\User;

if (!function_exists("generateUser")) {
    function generate_user($name, $password, $mobile = '')
    {
        $user = get_user($name);

        if (!$user) {

            $user = new User();
            $user->store([
                'name' => $name,
                'password' => Hash::make($password),
                'mobile' => $mobile ?: mb_substr($name, 0, 11),
            ]);

            return $user->id;

        }

        return false;
    }
}


if (!function_exists('get_user')) {
    function get_user($param)
    {
        if (is_numeric($param)) {
            return User::find($param);
        }

        if (is_string($param)) {
            return User::where('name', $param)->first();
        }
        if (is_array($param)) {
            return User::where([$param])->first();
        }
    }
}
