<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class invoice extends Model
{
    protected $fillable = ['collaborator_id', 'client_id', 'invoice_state_id', 'code', 'expiration_at', 'value_tax', 'total_value'];
    public function invoice_state() {
        return $this->belongsTo(InvoiceState::class);
    }

    public function client() {
        return $this->belongsTo(Client::class);
    }

    public function collaborator() {
        return $this->belongsTo(Collaborator::class);
    }

    public function invoice_products() {
        return $this->hasMany(InvoiceProduct::class);
    }
}
