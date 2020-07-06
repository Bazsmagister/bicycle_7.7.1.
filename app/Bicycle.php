<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Bicycle extends Model
{

    //public $timestamps = false;

    protected $guarded = [];

    //protected $fillable = [
  /*   name, price, rent_price, description, image,
    broughtIn_at,
    startedToServiceIt_at,
    readyToTakeIt_at]; */

    public $timestamps = true;

    // public function getImageAttribute()
    // {
    //     return $this->image;
    // }



    public function users()
    {
        return $this->belongsToMany(User::class)
        ->withTimestamps()
        ;
    }

    public function rents()
    {
        return $this->hasMany(App\Rent::class)
        /* ->withTimestamps() */
        ;
    }

    public function services()
    {
        return $this->hasMany(App\Service::class)
        /* ->withTimestamps() */
        ;
    }
}
