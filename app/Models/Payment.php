<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = ['product_id','transaction_id','amount','status'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
