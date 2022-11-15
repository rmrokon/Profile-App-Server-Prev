<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreInterestRequest extends FormRequest
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
            'interests' => ['required'],
            'profileAttributesId' => ['required']
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'profile_attributes_id' => $this->profileAttributesId
        ]);
    }
}
