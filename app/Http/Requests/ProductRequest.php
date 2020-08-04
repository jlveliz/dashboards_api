<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest implements ValidationInterface
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
        if ($this->method() == 'POST') {
            return $this->validateOnSave();
        } else {
            return $this->validateOnUpdate();
        }
    }

    public function validateOnSave()
    {
        return [
            'name' => 'requierd|unique:products,name',
            'code' => 'requierd|unique:products,code',
            'price' => 'required',
            'stock' => 'required',
            'user_creator_id' => 'exists:users,id'
        ];
    }

    public function validateOnUpdate()
    {
        $productId = $this->route('product');

        return [
            'name' => 'requierd|unique:products,name,'.$productId,
            'code' => 'requierd|unique:products,code,'.$productId,
            'price' => 'required',
            'stock' => 'required',
            'user_creator_id' => 'exists:users,id'
        ];

    }
}
