<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class invoice extends Model
{
    protected $fillable = ['collaborator_id', 'client_id', 'invoice_state_id', 'code', 'expiration_at', 'value_tax', 'total_value'];
    public function invoice_state() {
        return $this->belongsTo(invoice_state::class);
    }

    public function client() {
        return $this->belongsTo(client::class);
    }

    public function collaborator() {
        return $this->belongsTo(collaborator::class);
    }

    public function invoice_products() {
        return $this->hasMany(invoice_product::class);
    }
    
    public function search_database($query, $product_id){
        $product_price = DB::table('products')->where('id','=','1')->value('price');
        return $product_price;
    }
}
