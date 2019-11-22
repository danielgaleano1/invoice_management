<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    public function invoice_products() {
        return $this->hasMany(invoice_product::class);
    }
}
