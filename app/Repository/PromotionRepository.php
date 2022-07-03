<?php

namespace App\Repository;

use App\Models\Promotion;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PromotionRepository
 * @package App\Repository
 */
class PromotionRepository implements PromotionRepositoryInterface
{
    protected $promotion;

    /**
     * PromotionRepository constructor.
     * @param Promotion $promotion
     */
    public function __construct(Promotion $promotion)
    {
        $this->promotion = $promotion;
    }

    /**
     * @return Collection
     */
    public function getAllPromotionsWithUsers(): Collection
    {
        return $this->promotion->with('users')->get();
    }

    /**
     * @param int $promotion_id
     * @return Model
     */
    public function getPromotionWithUsers(int $promotion_id): Model
    {
        return $this->promotion->find($promotion_id)->with('users')->firstOrFail();
    }

    /**
     * @param string $code
     * @return mixed
     */
    public function getPromotionByCode(string $code)
    {
        return $this->promotion->where('code', $code)->first();
    }

    /**
     * @param array $promotion
     * @return Promotion
     */
    public function createPromotion(array $promotion): Promotion
    {
        return $this->promotion->create($promotion);
    }
}
