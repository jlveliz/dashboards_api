<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest implements ValidationInterface
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
            'parent_id' => 'exists:categories,id',
            'name' => 'required',
            'slug' => 'required'
        ];
    }

    public function validateOnUpdate()
    {
        return $this->validateOnSave();
    }
}
