<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Notifications\Notifiable;

class Service extends Model
{
    //use Notifiable;

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
