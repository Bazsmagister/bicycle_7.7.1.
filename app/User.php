<?php

namespace App;

use App\Bicycle;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Spatie\Permission\Traits\HasRoles; //spatie
use Illuminate\Foundation\Auth\User as Authenticatable;

//use App\Permissions\HasPermissionsTrait; //before Spatie package i used this trait.

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

    // protected $fillable = [
    //     'name', 'email', 'password', 'phone', 'created_at', 'updated_at'
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


    public function getImageAttribute()
    {
        return $this->profile_image;
        //so  I can use :auth()->user()->image instead of profile_image
    }

    public function rents()
    {
        return $this->hasMany(Rent::class)
        /* ->withTimestamps() */
        ;
        // ->withPivot('rents');
    }


    public function bicycles()
    {
        return $this->belongsToMany(Bicycle::class)->withTimestamps();
        // ->withPivot('rents');
    }


    public function services()
    {
        return $this->hasMany(Bicycle::class)->withTimestamps();
        // ->withPivot('rents');
    }

    // For rent
    // $user->cars()->attach($car_id, ['type' => 'rent']);

    // $user = User::with('bicycles')->find(1);

    // @foreach($user->cars as $car)

    // {{ $car->name }}

    // // Either buy or rent
    // {{ $car->pivot->type }}

    // @endforeach



    // public function buyingBicycles()
    // {
    //     return $this->belongsToMany(Bicycle::class)
    //             // ->wherePivot('type', 'buy')
    //             ->withPivot('rents');
    // }
}





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
