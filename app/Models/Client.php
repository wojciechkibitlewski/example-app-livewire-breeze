<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'prefix',
        'name',
        'email',
        'phone',
        'social',
        'note',
        'firm',
        'user_id',
    ];

    public function scopeSearch($query, $value)
    {
        $query -> where('name','like',"%{$value}%")->orWhere('email','like',"%{$value}%")->orWhere('phone','like',"%{$value}%");
    }
}
