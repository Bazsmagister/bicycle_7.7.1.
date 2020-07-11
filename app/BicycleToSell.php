<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BicycleToSell extends Model
{
    protected $table = "bicycle_to_sells";

    protected $guarded = [];

    //protected $fillable = ['manufacturer', 'gender', 'name', 'price', 'description', 'image'];

    //public $timestamps = false;
    public $timestamps = true;

    // public function getImageAttribute()
    // {
    //     return $this->image;
    // }


    public function user()
    {
        return $this->hasOne(User::class)
        ->withTimestamps()
        ;
    }


    public function services()
    {
        return $this->hasMany(App\Service::class)
        /* ->withTimestamps() */
        ;
    }
}
