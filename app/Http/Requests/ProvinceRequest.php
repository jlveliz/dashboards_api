<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProvinceRequest extends FormRequest implements ValidationInterface
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
        if($this->method() == 'POST') {
            return $this->validateOnSave();
        } else {
            return $this->validateOnUpdate();
        }
    }

    public function validateOnSave()
    {
        return [
            'country_id'=>'required|exists:provinces,id',
            'name' => 'required|unique:provinces,name',
            'code' => 'required|unique:provinces,code'
        ];
    }

    public function validateOnUpdate()
    {
        $provId = $this->route('province');
        return [
            'country_id'=>'required|exists:provinces,id',
            'name' => 'required|unique:provinces,name,'.$provId,
            'code' => 'required|unique:provinces,code,'.$provId,
        ];
    }
}
