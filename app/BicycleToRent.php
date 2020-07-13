<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BicycleToRent extends Model
{
    protected $table = "bicycle_to_rents";

    protected $guarded = [];

    //protected $fillable = ['name', 'rent_price', 'description', 'image'];

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
}
