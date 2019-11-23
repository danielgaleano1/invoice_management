<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class client extends Model
{
    public function city() {
        return $this->belongsTo(city::class);
    }

    public function invoices() {
        return $this->hasMany(invoice::class);
    }
}
