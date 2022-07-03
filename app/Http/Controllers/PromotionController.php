<?php

namespace App\Http\Controllers;

use App\Http\Requests\AssignPromotionRequest;
use App\Services\PromotionService;
use App\Services\WalletService;
use App\Traits\ResponseMessage;
use Illuminate\Http\JsonResponse;

/**
 * Class PromotionController
 * @package App\Http\Controllers
 */
class PromotionController extends Controller
{
    use ResponseMessage;

    protected $promotionService;
    protected $walletService;

    /**
     * PromotionController constructor.
     * @param PromotionService $promotionService
     * @param WalletService $walletService
     */
    public function __construct(PromotionService $promotionService, WalletService $walletService)
    {
        $this->promotionService = $promotionService;
        $this->walletService = $walletService;
    }

    /**
     * @param AssignPromotionRequest $request
     * @return JsonResponse
     */
    public function assignPromotion(AssignPromotionRequest $request): JsonResponse
    {
        $promotion =  $this->promotionService->getPromotionByCode($request->code);

        if ($promotion->checkUser(auth()->id()))
            return $this->returnMessage('This promotion has been used before',false, 422);

        $assign_promotion = $this->walletService->increaseBalance($promotion->amount);

        if (!$assign_promotion)
            return $this->returnStatus(false, 422);

        $promotion->users()->attach(auth()->id());

        return $this->returnStatus();
    }
}
