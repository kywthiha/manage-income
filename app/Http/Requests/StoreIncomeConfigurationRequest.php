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
            'save_money_rate' => 'required|numeric|max:99',
            'tax_money_rate' => 'required|numeric|max:99',
            'general_expenses_rate' => 'required|numeric|max:99',
            'extra_money_rate' => 'required|numeric|max:99',
        ];
    }
}
