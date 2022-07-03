<?php

namespace App\Repository;

use App\Models\Wallet;

/**
 * Interface WalletRepositoryInterface
 * @package App\Repository
 */
interface WalletRepositoryInterface
{
    /**
     * @param Wallet $wallet
     */
    public function __construct(Wallet $wallet);

    /**
     * @param int $amount
     * @return bool
     */
    public function increaseBalance(int $amount): bool;
}
