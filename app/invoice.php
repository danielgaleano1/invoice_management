<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = ['collaborator_id', 'client_id', 'invoice_state_id', 'code', 'expiration_at', 'value_tax', 'total_value'];
    
    public function invoiceState()
    {
        return $this->belongsTo(InvoiceState::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function collaborator()
    {
        return $this->belongsTo(Collaborator::class);
    }

    public function invoiceProducts()
    {
        return $this->hasMany(InvoiceProduct::class);
    }

    public function Payment()
    {
        return $this->hasMany(Payment::class);
    }

    public function scopeSearchs($query, $searchs) 
    {
        if ($searchs){
            return $query->where('code','like',"%$searchs%");
        }
    }
}
