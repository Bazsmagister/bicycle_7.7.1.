<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    //
    protected $guarded = [];

    protected $casts = [
        'broughIn_at' => 'datetime',
        'startedToService_at' => 'datetime',
        'readyToTakeIt_at' => 'datetime'
    ];

    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function bicycle()
    {
        return $this->belongsTo('App\Bicycle');
    }
}
