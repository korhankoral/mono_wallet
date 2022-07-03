<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Http\Requests\generatePromotionRequest;
use App\Services\PromotionService;
use App\Traits\ResponseMessage;
use Illuminate\Http\JsonResponse;

/**
 * Class PromotionController
 * @package App\Http\Controllers\Backoffice
 */
class PromotionController extends Controller
{
    use ResponseMessage;

    protected $promotionService;

    /**
     * PromotionController constructor.
     * @param PromotionService $promotionService
     */
    public function __construct(PromotionService $promotionService)
    {
        $this->promotionService = $promotionService;
    }

    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return $this->returnData($this->promotionService->getAllPromotionsWithUsers());
    }

    /**
     * @param int $id
     * @return JsonResponse
     */
    public function store(int $id): JsonResponse
    {
        return $this->returnData($this->promotionService->getPromotionWithUsers($id));
    }

    /**
     * @param generatePromotionRequest $request
     * @return JsonResponse
     */
    public function create(GeneratePromotionRequest $request): JsonResponse
    {
        return $this->returnData($this->promotionService->createPromotion($request));
    }
}
