<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class city extends Model
{
    public function countries() {
        return $this->belongsTo(country::class);
    }

    public function clients() {
        return $this->hasMany(client::class);
    }

    public function users() {
        return $this->hasMany(user_employee::class);
    }
}
