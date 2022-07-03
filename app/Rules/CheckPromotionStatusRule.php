<?php

namespace App\Rules;

use App\Repository\PromotionRepositoryInterface;
use App\Services\PromotionService;
use Carbon\Carbon;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\App;

/**
 * Class CheckPromotionStatusRule
 * @package App\Rules
 */
class CheckPromotionStatusRule implements Rule
{
    /**
     * @param $attribute
     * @param $value
     * @return bool
     */
    public function passes($attribute, $value): bool
    {
        $promotionRepository = App::make(PromotionRepositoryInterface::class);
        $promotion = $promotionRepository->getPromotionByCode($value) ?? false;

        if (!$promotion)
            return $promotion;

        return $promotion->start_date->timestamp <= Carbon::now()->timestamp
            && $promotion->end_date->timestamp >= Carbon::now()->timestamp
            && $promotion->usersCount() < $promotion->quota;
    }

    /**
     * @return string
     */
    public function message()
    {
        return 'No active promotions found';
    }
}
