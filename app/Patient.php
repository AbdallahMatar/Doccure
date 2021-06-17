<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Patient extends Authenticatable
{
    //
    public function state()
    {
        return $this->belongsTo(State::class, 'state_id', 'id');
    }


    public function doctors()
    {
        return $this->belongsToMany(Doctor::class, Appointment::class, 'patient_id', 'doctor_id');
    }
}
