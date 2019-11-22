<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class profile extends Model
{
    public function users() {
        return $this->hasMany(user_employee::class);
    }
}
