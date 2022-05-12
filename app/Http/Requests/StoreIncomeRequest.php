<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class StoreIncomeRequest extends FormRequest
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
            'income' => 'required|numeric',
        ];
    }


    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            // if (!Carbon::now()->isSameDay(Carbon::now()->endOfMonth())) {
            //     $validator->errors()->add('date', 'This date must be  last date of the month');
            // }
        });
    }
}
