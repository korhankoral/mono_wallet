<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class GeneratePromotionRequest
 * @package App\Http\Requests
 */
class GeneratePromotionRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'start_date' => 'required|date_format:Y-m-d H:i|after_or_equal:now',
            'end_date' => 'required|date_format:Y-m-d H:i|after_or_equal:start_date',
            'amount' => 'required|numeric|min:1',
            'quota' => 'required|integer|min:1',
        ];
    }
}
