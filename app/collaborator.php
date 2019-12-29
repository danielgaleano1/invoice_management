<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Collaborator extends Model
{
    public function profile() {
        return $this->belongsTo(profile::class);
    }

    public function city() {
        return $this->belongsTo(City::class);
    }

    public function invoices() {
        return $this->hasMany(Invoice::class);
    }
}
