<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ['code', 'name', 'address', 'phone', 'email', 'city_id'];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function document_type()
    {
        return $this->belongsTo(DocumentType::class);
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

    public function getFullNameAttribute()
    {
        return $this->name . ' ' . $this->surname;
    }
}
