<?php

namespace App\Services;

use App\Repository\WalletRepositoryInterface;

/**
 * Class WalletService
 * @package App\Services
 */
class WalletService
{
    protected $walletRepository;

    /**
     * WalletService constructor.
     * @param WalletRepositoryInterface $walletRepository
     */
    public function __construct(WalletRepositoryInterface $walletRepository)
    {
        $this->walletRepository = $walletRepository;
    }

    /**
     * @param int $amount
     * @return bool
     */
    public function increaseBalance(int $amount)
    {
        return $this->walletRepository->increaseBalance($amount);
    }
}
