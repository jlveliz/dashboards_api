<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CountryRequest extends FormRequest implements ValidationInterface
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
            'name' => 'required|unique:countries',
            'code' => 'required|unique:countries'
        ];
    }

    public function validateOnUpdate()
    {
        $countryId = $this->route('country');
        return [
            'name' => 'required|unique:countries,id,'.$countryId,
            'code' => 'required|unique:countries,id,'.$countryId,
        ];
    }
}
