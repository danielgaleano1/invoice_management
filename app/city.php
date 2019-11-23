<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class city extends Model
{
    public function country() {
        return $this->belongsTo(country::class);
    }

    public function clients() {
        return $this->hasMany(client::class);
    }

    public function collaborator() {
        return $this->hasMany(collaborator::class);
    }
}
