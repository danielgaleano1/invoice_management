<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = ['invoice_id', 'status', 'request_id', 'processUrl',];

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }
}
