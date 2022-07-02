<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MealRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'required|string|min:3|max:50',
            'description'=>'required|string|min:3|max:500',
            'small_meal_price'=>'required|numeric',
            'medium_meal_price'=>'required|numeric',
            'large_meal_price'=>'required|numeric',
            'category'=>'required',
            'image'=>'required|image|mimes:png,jpg,jpeg',
        ];
    }
}
