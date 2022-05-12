<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreIncomeConfigurationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'save' => 'required|numeric|max:99',
            'tax' => 'required|numeric|max:99',
            'general_expenses' => 'required|numeric|max:99',
            'extra' => 'required|numeric|max:99',
        ];
    }
}
