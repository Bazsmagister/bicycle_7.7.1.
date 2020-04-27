<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Permissions\HasPermissionsTrait;

class User extends Authenticatable
{
    use Notifiable;
    use HasPermissionsTrait; //Import The Trait


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    // protected $fillable = [
    //     'name', 'email', 'password', 'phone', 'created_at'
    // ];

    protected $guarded = [];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

        // In your User model, add the following line in the User class:
        // Now, whenever you save or update a user, Laravel will automatically update the created_at and updated_at fields.
    public $timestamps = true;

}
