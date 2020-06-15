<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Bicycle extends Model
{

    //public $timestamps = false;

    protected $guarded = [];

    //protected $fillable = [''];

    public $timestamps = true;

    // public function getImageAttribute()
    // {
    //     return $this->image;
    // }



    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    public function rents()
    {
        return $this->hasMany(App\Rent::class)->withTimestamps();
    }
}
