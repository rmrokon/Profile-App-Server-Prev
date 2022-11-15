<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = [
        'name',
        'email'
    ];


    use HasFactory;

    public function profiles()
    {
        return $this->hasMany(Profile::class);
    }
}
