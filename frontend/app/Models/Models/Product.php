<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['product_code', 'name', 'description', 'qty_stock', 'on_hand', 'price', 'category_id', 'supplier_id', 'date_stock_in'];

    public $timestamps = false;

    protected $casts = [
        'date_stock_in' => 'datetime',
    ];
    
}
