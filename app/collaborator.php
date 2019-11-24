<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class collaborator extends Model
{
    public function profile() {
        return $this->belongsTo(profile::class);
    }

    public function city() {
        return $this->belongsTo(city::class);
    }

    public function invoices() {
        return $this->hasMany(invoice::class);
    }
}
