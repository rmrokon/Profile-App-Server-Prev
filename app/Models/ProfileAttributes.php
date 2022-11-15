<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileAttributes extends Model
{
    use HasFactory;

    protected $fillable = [
        'profile_id',
        'about',
        'is_about_private',
        'facebook',
        'is_facebook_private',
        'linkedin',
        'is_linkedin_private',
        'instagram',
        'is_instagram_private',
    ];


    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function interest()
    {
        return $this->hasMany(Interest::class);
    }
}
