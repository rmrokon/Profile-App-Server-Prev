<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProfileAttributesRequest extends FormRequest
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
            'profileId' => ['required']
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'profile_id' => $this->profileId,
            'is_facebook_private' => $this->isFacebookPrivate,
            'is_linkedin_private' => $this->isLinkedinPrivate,
            'is_facebook_private' => $this->isInstagramPrivate,
            'is_instagram_private' => $this->isFacebookPrivate,
        ]);
    }
}
