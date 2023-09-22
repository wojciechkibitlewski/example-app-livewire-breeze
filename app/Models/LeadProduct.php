<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeadProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'lead_id',
        'product_id',
        'quant',
        'product_price',
        'product_value',
        'product_name',
        'product_prefix',
        'user_id',
    ];
}

