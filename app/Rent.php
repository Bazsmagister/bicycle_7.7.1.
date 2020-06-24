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
    //You may disable the default created_at and updated_at timestamps by setting the public $timestamps property of your model to false.
    
    protected $dates = [
    'rentStarted_at',
    'rentEnds_at'
    ];

    //As noted above, when retrieving attributes that are listed in your $dates property, they will automatically be cast to Carbon instances, allowing you to use any of Carbon's methods on your attributes:
    //$user = App\User::find(1);
    //return $user->deleted_at->getTimestamp();

    //By default, timestamps are formatted as 'Y-m-d H:i:s'. If you need to customize the timestamp format, set the $dateFormat property on your model.
    
    //protected $dateFormat = 'U'; //it gives you Unix Timestamp

    protected $casts = [
        //'is_rentable' => 'boolean',
    ];

    //When using the date or datetime cast type, you may specify the date's format. This format will be used when the model is serialized to an array or JSON:
   /*  protected $casts = [
    'created_at' => 'datetime:Y-m-d',
    ]; */

}

