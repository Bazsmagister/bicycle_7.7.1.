<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
    public function bicycle()
    {
        return $this->belongsTo('App\Bicycle');
        // ->withTimestamps();
    }

    public function user()
    {
        return $this->belongsTo('App\User');
        //    ->withTimestamps();
    }

    protected $guarded = [];
    public $timestamps = true;
}
