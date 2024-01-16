<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
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
            'name'=>'required|string',
            'image'=>'nullable|file|image|mimes:jpg,png',
            'description'=>'nullable|string',
            'selling_price'=>'required|numeric|not_in:0',
            'Purchasing_price'=>'required|numeric|not_in:0',
            'category_id'=>'required',
            'barcode'=>['nullable', Rule::unique('products')->ignore($this->product)]
        ];
    }
}
