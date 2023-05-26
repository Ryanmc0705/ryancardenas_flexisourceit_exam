<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    protected $table = "users";
    protected $guarded = [];
    public $timestamps = false;


    public function UserPicture()
    {
        return $this->hasMany(UserPicture::class);
    }
    public function getFullNameAttribute()
    {
        return $this->firstname." ".$this->lastname;
    }
}
