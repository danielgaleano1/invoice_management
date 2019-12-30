<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function invoiceProducts()
    {
        return $this->hasMany(InvoiceProduct::class);
    }
}
