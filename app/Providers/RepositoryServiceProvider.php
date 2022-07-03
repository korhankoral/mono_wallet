<?php

namespace App\Providers;

use App\Repository\PromotionRepository;
use App\Repository\PromotionRepositoryInterface;
use App\Repository\WalletRepository;
use App\Repository\WalletRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(PromotionRepositoryInterface::class, PromotionRepository::class);
        $this->app->bind(WalletRepositoryInterface::class, WalletRepository::class);
    }

}
