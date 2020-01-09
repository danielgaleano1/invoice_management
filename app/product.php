<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function invoiceProducts()
    {
        return $this->hasMany(InvoiceProduct::class);
    }

    public function scopeSearchs($query, $searchs) 
    {
        if ($searchs){
            return $query->where('code','like',"%$searchs%");
        }
    }
}
