<?php


namespace Modules\User\Service;


use Illuminate\Support\Facades\DB;
use Modules\User\Models\User;
use Modules\User\Models\UserBalance;
use Modules\User\Models\UserPoint;

class UserService
{
    public function balance(float $balance, int $id): bool
    {
        DB::beginTransaction();
        try {
            $user = User::find($id);
            $log = (new UserBalance())->store([
                'user_id' => $id,
                'before' => $user['balance'],
                'balance' => $balance,
                'after' => ($balance + $user['balance']),
            ]);

            $user->balance = ($balance + $user['balance']);
            $result = $user->save();

            if ($result !== false && $log !== false) {
                Db::commit();
                return true;
            } else {
                Db::rollBack();
                return false;
            }

        } catch (\Exception $e) {
            Db::rollBack();
            return false;
        }

    }

    public function point(float $point, int $id): bool
    {
        DB::beginTransaction();

        try {
            $user = User::find($id);
            $log = (new UserPoint())->store([
                'user_id' => $id,
                'before' => $user['point'],
                'point' => $point,
                'after' => ($point + $user['point']),
            ]);

            $user->point = ($point + $user['point']);
            $result = $user->save();

            if ($result !== false && $log !== false) {
                Db::commit();
                return true;
            } else {
                Db::rollBack();
                return false;
            }
        } catch (\Exception $e) {
            Db::rollBack();
            return false;
        }
    }
}
