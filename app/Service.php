<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

//use Illuminate\Notifications\Notifiable;

class Service extends Model
{
    //use Notifiable;

    // protected $fillable = [
    //      'bicycle_id',
    //      'user_id',
    //    'broughIn_at'
    //    'startedToService_at', 
    //    'readyToTakeIt_at', 
    //    'taken_at',
    //    'isActive',
    // ];

    protected $guarded = [];

    protected $casts = [
        'broughIn_at' => 'datetime',
        'startedToService_at' => 'datetime',
        'readyToTakeIt_at' => 'datetime',
        'taken_at' => 'datetime',
        'isActive' => 'boolean'

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
