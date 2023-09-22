<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leads extends Model
{
    use HasFactory;

    protected $fillable = [
        'prefix',
        'title',
        'note',
        'noteForClient',
        'leadValue',
        'advanceValue',
        'source_id',
        'type_id',
        'executionDate',
        'executionTime',
        'user_id',
        'client_id',
        'client_prefix',

    ];

        public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function scopeSearch($query, $value)
    {
        $query->where(function ($query) use ($value) {
            $query->where('title', 'like', "%{$value}%")
                ->orWhereHas('client', function ($query) use ($value) {
                    $query->where('name', 'like', "%{$value}%")
                        ->orWhere('email', 'like', "%{$value}%")
                        ->orWhere('phone', 'like', "%{$value}%");
                });
        });
    }
}
