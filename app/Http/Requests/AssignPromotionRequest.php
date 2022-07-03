<?php

namespace App\Http\Requests;

use App\Rules\CheckPromotionStatusRule;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class AssignPromotionRequest
 * @package App\Http\Requests
 *
 * @property string $code
 */
class AssignPromotionRequest extends FormRequest
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
            'code' => ['required', new CheckPromotionStatusRule]
        ];
    }
}
