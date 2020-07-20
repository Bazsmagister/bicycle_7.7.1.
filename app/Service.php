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

        // 'broughIn_at' => 'datetime',
        // 'startedToService_at' => 'datetime',
        // 'readyToTakeIt_at' => 'datetime',
        // 'taken_at' => 'datetime',

        'accepted' => 'datetime',
        'repairing' => 'datetime',
        'ready' => 'datetime',
        'taken' => 'datetime',

        'isActive' => 'boolean'

    ];

    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo('App\User');
        //->withTimestamps(); only in manyToMany!
    }

    public function bicycle()
    {
        return $this->belongsTo('App\BicycleToService');
    }

    // public function setActive()
    // {
    //     $this->isActive = true;
    // }

    // public function getActive()
    // {
    //     return $this->isActive;
    // }


    // public $status;

    // public function setStatus($status)
    // {
    //     $this->status = $status;
    // }

    // public function getStatus()
    // {
    //     return $this->status;
    // }



    // /**
    //  * Get the value of status
    //  */
    // public function getStatus()
    // {
    //     return $this->status;
    // }

    // /**
    //  * Set the value of status
    //  *
    //  * @return  self
    //  */
    // public function setStatus($status)
    // {
    //     $this->status = $status;

    //     return $this;
    // }
}
