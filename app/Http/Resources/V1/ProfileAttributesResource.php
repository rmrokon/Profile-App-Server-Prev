<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class ProfileAttributesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'about' => $this->about,
            'isAboutPrivate' => $this->is_about_private,
            'facebook' => $this->facebook,
            'isFacebookPrivate' => $this->is_facebook_private,
            'linkedin' => $this->linkedin,
            'isLinkedinPrivate' => $this->is_linkedin_private,
            'instagram' => $this->instagram,
            'isInstagramPrivate' => $this->is_instagram_private,
            'profileId' => $this->profile_id,
            'interests' => InterestResource::collection($this->whenLoaded('interest'))
        ];
    }
}
