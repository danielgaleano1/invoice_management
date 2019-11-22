<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class invoice_state extends Model
{
    public function invoices() {
        return $this->hasMany(invoice::class);
    }
}
