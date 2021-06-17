<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    //
    public function states()
    {
        return $this->hasMany(State::class, 'city_id', 'id');
    }

    public function admins()
    {
        return $this->hasManyThrough(Admin::class, State::class, 'city_id', 'state_id', 'id', 'id');
    }

    public function doctors()
    {
        return $this->hasManyThrough(Doctor::class, State::class, 'city_id', 'state_id', 'id', 'id');
    }

    public function patients()
    {
        return $this->hasManyThrough(Patient::class, State::class, 'city_id', 'state_id', 'id', 'id');
    }
}
