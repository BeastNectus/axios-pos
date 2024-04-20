<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = ['customer_id', 'product_name', 'quantity', 'price', 'total', 'cash', 'date'];

    protected $primaryKey = 'invoice_id';

    public $timestamps = false;
    
}
