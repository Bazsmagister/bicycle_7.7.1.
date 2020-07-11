<?php

namespace App;

//use Illuminate\Database\Eloquent\Model; //do I need this?

use App\Bicycle;
use App\Notifications\rentIsOver;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;


use Spatie\Permission\Traits\HasRoles; //spatie
use Illuminate\Foundation\Auth\User as Authenticatable;

//use App\Permissions\HasPermissionsTrait; //before Spatie package i used this trait.

//class User extends Authenticatable implements MustVerifyEmail

class User extends Authenticatable
{
    use Notifiable;

    use HasRoles; //spatie
    use SoftDeletes; //trash user

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

    /*  protected $casts = [
     'secret' => Hash::class.':sha256',
     ]; */

    // In your User model, add the following line in the User class:
    // Now, whenever you save or update a user, Laravel will automatically update the created_at and updated_at fields.
    public $timestamps = true;

    //protected $with = ['rents'];
    //protected $with = ['rents', 'bicycles'];

    //After that you can set the $with property to eager load the relation.

    //protected $visible = ['id','name', 'email','rents'];
    //protected $visible = ['id','name','rents', 'email', 'bicycles'];
    //Setting the $visible property to include the details will make the details visible when the Student gets converted to an array.

    public function getImageAttribute()
    {
        return $this->profile_image;
        //so  I can use :auth()->user()->image instead of profile_image
    }

    //makes the password always hashed:
    // public function setPasswordAttribute($value)
    // {
    //     $this->attributes['password'] = Hash::make($value);
    // }

    public function rents()
    {
        return $this->hasMany(Rent::class)
        //->withTrashed();
        /* ->withTimestamps() */
        ;
        // ->withPivot('rents');
    }

    public function bicycleToSell()
    {
        return $this->belongsToMany(BicycleToSell::class)->withTimestamps();
        // ->withPivot('rents');
    }

    public function bicycleToRent()
    {
        return $this->belongsToMany(BicycleToRent::class)->withTimestamps();
        // ->withPivot('rents');
    }


    public function services()
    {
        return $this->hasMany(BicycleToService::class)->withTimestamps();
        // ->withPivot('rents');
    }

    public function getId()
    {
        return $this->id;
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
