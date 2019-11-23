<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class invoice extends Model
{
    public function invoice_state() {
        return $this->belongsTo(invoice_state::class);
    }

    public function client() {
        return $this->belongsTo(client::class);
    }

    public function user() {
        return $this->belongsTo(user_employee::class);
    }

    public function invoice_products() {
        return $this->hasMany(invoice_product::class);
    }
}
