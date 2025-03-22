<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreJewelryRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "img" => "required|image",
            "alternateImg" => "image",
            "type" => "required",
            "correct" => "required",
        ];
    }

    public function messages(): array
    {
        return [
            "img.required" => "Это обязательное поле",
            "type.required" => "Это обязательное поле",
            "correct.required" => "Это обязательное поле"
        ];
    }
}
