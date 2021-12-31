<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PetsStoreRequest extends FormRequest
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
            'name' => 'required',
            'age' => 'required|numeric',
            'race' => 'required',
            'description' => 'required',
            'pet_type_id' => 'required|numeric',
        ];
    }
}
