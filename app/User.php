<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles; //spatie

//use App\Permissions\HasPermissionsTrait; //before Spatie pacjage i used this trait.

//class User extends Authenticatable implements MustVerifyEmail

class User extends Authenticatable
{
    use Notifiable;

    use HasRoles; //spatie



    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'name', 'email', 'password', 'phone', 'created_at', 'updated_at'
    ];

    //protected $guarded = [];


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



    // public function roles() {

    //     return $this->belongsToMany(Role::class);

    // }

    // public function permissions() {

    //         return $this->belongsToMany(Permission::class);

    // }

    // public function hasRole($name)
    // {
    //     foreach ($this->roles as $role)
    //     {
    //         if ($role->name == $name) return true;
    //     }
    //     return false;
    // }


    // public function assignRole($role)
    // {
    //     return $this->roles()->attach($role);
    // }


    // public function removeRole($role)
    // {
    //     return $this->roles()->detach($role);
    // }
}
