<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    //
    protected $guarded = [];

    public function users()
    {
        $this->belongsTo('App\Users');
    }

    public function bicycles()
    {
        $this->belongsTo('App\Bicycle');
    }
}
