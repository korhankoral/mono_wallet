<?php

namespace App\Services;

use App\Http\Requests\generatePromotionRequest;
use App\Models\Promotion;
use App\Repository\PromotionRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

/**
 * Class PromotionService
 * @package App\Services
 */
class PromotionService
{
    protected $promotionRepository;

    /**
     * PromotionService constructor.
     * @param PromotionRepositoryInterface $promotionRepository
     */
    public function __construct(PromotionRepositoryInterface $promotionRepository)
    {
        $this->promotionRepository = $promotionRepository;
    }

    /**
     * @param string $code
     * @return Promotion
     */
    public function getPromotionByCode(string $code): Promotion
    {
        return $this->promotionRepository->getPromotionByCode($code);
    }

    /**
     * @return Collection
     */
    public function getAllPromotionsWithUsers(): Collection
    {
        return $this->promotionRepository->getAllPromotionsWithUsers();
    }

    /**
     * @param int $promotion_id
     * @return Model
     */
    public function getPromotionWithUsers(int $promotion_id): Model
    {
        return $this->promotionRepository->getPromotionWithUsers($promotion_id);
    }

    /**
     * @param generatePromotionRequest $request
     * @return Promotion
     */
    public function createPromotion(GeneratePromotionRequest $request): Promotion
    {
        return $this->promotionRepository->createPromotion($request->validated());
    }
}
