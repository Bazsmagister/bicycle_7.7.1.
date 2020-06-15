<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    //
    protected $guarded = [];

    public function users()
    {
        return $this->belongsTo('App\User');
    }

    public function bicycles()
    {
        return $this->belongsTo('App\Bicycle');
    }
}
