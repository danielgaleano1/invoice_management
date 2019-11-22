<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class country extends Model
{
    public function cities() {
        return $this->hasMany(city::class);
    }
}
