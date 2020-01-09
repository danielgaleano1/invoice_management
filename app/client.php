<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }

    public function scopeSearchs($query, $searchs) 
    {
        if ($searchs){
            return $query->where('code','like',"%$searchs%");
        }
    }
}
