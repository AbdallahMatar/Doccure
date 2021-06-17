<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    //
    public function city()
    {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }

    public function admins()
    {
        return $this->hasMany(Admin::class, 'state_id', 'id');
    }

    public function doctors()
    {
        return $this->hasMany(Doctor::class, 'state_id', 'id');
    }

    public function patients()
    {
        return $this->hasMany(Patient::class, 'state_id', 'id');
    }
}
