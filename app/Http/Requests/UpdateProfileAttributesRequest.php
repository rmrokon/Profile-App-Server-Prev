<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileAttributesRequest extends FormRequest
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
        $method = $this->method();

        if ($method == 'PUT') {
            return [
                'profile_id' => ['required'],
                'about' => ['required'],
                'isAboutPrivate' => ['required'],
                'facebook' => ['required'],
                'isFacebookPrivate' => ['required'],
                'linkedin' => ['required'],
                'isLinkedinPrivate' => ['required'],
                'instagram' => ['required'],
                'isInstagramPrivate' => ['required'],
            ];
        } else {
            return [
                'profile_id' => ['sometimes', 'required'],
                'about' => ['sometimes', 'required'],
                'isAboutPrivate' => ['sometimes', 'required'],
                'facebook' => ['sometimes', 'required'],
                'isFacebookPrivate' => ['sometimes', 'required'],
                'linkedin' => ['sometimes', 'required'],
                'isLinkedinPrivate' => ['sometimes', 'required'],
                'instagram' => ['sometimes', 'required'],
                'isInstagramPrivate' => ['sometimes', 'required'],
            ];
        }
    }

    protected function prepareForValidation()
    {
        if ($this->profileId) {
            $this->merge([
                'profile_id' => $this->profileId,
            ]);
        }
        if ($this->isAboutPrivate) {
            $this->merge([
                'is_about_private' => $this->isAboutPrivate,
            ]);
        }
        if ($this->isFacebookPrivate) {
            $this->merge([
                'is_facebook_private' => $this->isFacebookPrivate,
            ]);
        }
        if ($this->isLinkedinPrivate) {
            $this->merge([
                'is_linkedin_private' => $this->isLinkedinPrivate,
            ]);
        }
        if ($this->isInstagramPrivate) {
            $this->merge([
                'is_instagram_private' => $this->isInstagramPrivate,
            ]);
        }
    }
}
