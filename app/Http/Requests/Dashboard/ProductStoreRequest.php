<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
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
            'name'=>'required',
            'price' =>'required|numeric',
            'image'=>'nullable',
            'category_id' =>'required|exists:categories,id',
            'description' =>'required|string',
            'discount_price'=>'nullable',
            'color'=>'array|nullable',
            'size'=>'array|nullable',
            'images'=>'array|nullable',
        ];
    }
}
