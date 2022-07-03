<?php

namespace App\Repository;

use App\Models\Wallet;

/**
 * Class WalletRepository
 * @package App\Repository
 */
class WalletRepository implements WalletRepositoryInterface
{
    protected $wallet;

    /**
     * @param Wallet $wallet
     */
    public function __construct(Wallet $wallet)
    {
        $this->wallet = $wallet;
    }

    /**
     * @param int $amount
     * @return bool
     */
    public function increaseBalance(int $amount): bool
    {
        return $this->wallet->where('user_id', auth()->user()->id)->increment('balance', $amount) ? true : false;
    }
}
