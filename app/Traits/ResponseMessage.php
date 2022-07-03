<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

/**
 * Trait ResponseMessage
 * @package App\Traits
 */
trait ResponseMessage
{
    /**
     * @param mixed $data
     * @param bool $status
     * @param int $statusCode
     * @return JsonResponse
     */
    public function returnData($data, bool $status = true, int $statusCode = 200): JsonResponse
    {
        return response()->json(['success' => $status, 'data' => $data], $statusCode);
    }

    /**
     * @param bool $status
     * @param int $statusCode
     * @return JsonResponse
     */
    public function returnStatus(bool $status = true, int $statusCode = 200): JsonResponse
    {
        return response()->json(['success' => $status], $statusCode);
    }

    /**
     * @param string $message
     * @param bool $status
     * @param int $statusCode
     * @return JsonResponse
     */
    public function returnMessage(string $message, bool $status = true, int $statusCode = 200): JsonResponse
    {
        return response()->json(['success' => $status, 'message' => $message], $statusCode);
    }
}
