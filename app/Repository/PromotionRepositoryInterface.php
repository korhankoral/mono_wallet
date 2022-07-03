<?php

namespace App\Repository;

use App\Models\Promotion;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Interface PromotionRepositoryInterface
 * @package App\Repository
 */
interface PromotionRepositoryInterface
{
    /**
     * PromotionRepository constructor.
     * @param Promotion $promotionCode
     */
    public function __construct(Promotion $promotionCode);

    /**
     * @return Collection
     */
    public function getAllPromotionsWithUsers(): Collection;


    /**
     * @param int $promotion_id
     * @return Model
     */
    public function getPromotionWithUsers(int $promotion_id): Model;

    /**
     * @param string $code
     * @return mixed
     */
    public function getPromotionByCode(string $code);

    /**
     * @param array $promotion
     * @return Promotion
     */
    public function createPromotion(array $promotion): Promotion;
}
