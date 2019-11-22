<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class invoice_product extends Model
{
    public function invoices() {
        return $this->belongsTo(invoice::class);
    }

    public function products() {
        return $this->belongsTo(product::class);
    }
}
