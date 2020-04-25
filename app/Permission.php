<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    //
    public function roles() {

    // return $this->belongsToMany(Role::class,'permissions_roles');
    return $this->belongsToMany(Role::class);


    }

    public function users() {

    // return $this->belongsToMany(User::class,'permissions_users');
    return $this->belongsToMany(User::class);


    }
}
