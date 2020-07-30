<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CityRequest extends FormRequest implements ValidationInterface
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
            'province_id'=>'required|exists:provinces,id',
            'name' => 'required|unique:cities,name',
            'code' => 'required|unique:cities,name'
        ];
    }

    public function validateOnUpdate()
    {
        $cityId = $this->route('city');
        return [
            'province_id'=>'required|exists:provinces,id',
            'name' => 'required|unique:cities,name,'.$cityId,
            'code' => 'required|unique:cities,code,'.$cityId,
        ];
    }
}
