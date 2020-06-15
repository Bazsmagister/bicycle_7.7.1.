<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
    public function bicycle()
    {
        return $this->belongsTo('App\Bicycles');
    }

    public function user()
    {
        $this->belongsTo('App\Users');
    }

    protected $guarded = [];
    public $timestamps = true;
}
