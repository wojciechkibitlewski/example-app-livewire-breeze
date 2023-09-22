<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'prefix',
        'sku',
        'name',
        'desc',
        'quant',
        'price',
        'category_id',
        'user_id',
    ];

    public function scopeSearch($query, $value)
    {
        $query -> where('name','like',"%{$value}%");
    }
}
