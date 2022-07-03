<?php

namespace App\Observers;

use App\Models\User;
use App\Models\Wallet;

/**
 * Class UserObserver
 * @package App\Observers
 */
class UserObserver
{
    const NEW_USER_BALANCE = 0;

    /**
     * Handle the User "created" event.
     * @param User $user
     * @return void
     */
    public function created(User $user): void
    {
        (new Wallet)->create([
            'balance' => self::NEW_USER_BALANCE,
            'user_id' => $user->id,
        ]);
    }
}
