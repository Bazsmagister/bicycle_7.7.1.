<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bicycle extends Model
{

    //public $timestamps = false;

    protected $guarded = [];

    //protected $fillable = [''];

    public $timestamps = true;

    public function getImageAttribute()
    {
        return $this->image;
    }
}
