<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{   
    //
    public function state()
    {
        return $this->belongsTo(State::class, 'state_id', 'id');
    }
}
