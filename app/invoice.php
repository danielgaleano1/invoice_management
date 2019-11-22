<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class invoice extends Model
{
    public function invoice_states() {
        return $this->belongsTo(invoice_state::class);
    }

    public function clients() {
        return $this->belongsTo(client::class);
    }

    public function users() {
        return $this->belongsTo(user_employee::class);
    }

    public function invoice_products() {
        return $this->hasMany(invoice_product::class);
    }
}
