<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BicycleToService extends Model
{
    protected $table = "bicycle_to_services";

    protected $guarded = [];

    //protected $fillable = ['name', 'working_hour', 'description' ];

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
