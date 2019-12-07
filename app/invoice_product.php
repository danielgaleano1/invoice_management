<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class invoice_product extends Model
{
    protected $fillable = ['invoice_id', 'product_id', 'quantity', 'price'];

    public function invoice() {
        return $this->belongsTo(invoice::class);
    }

    public function product() {
        return $this->belongsTo(product::class);
    }
}
