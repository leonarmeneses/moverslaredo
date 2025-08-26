<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'move_date',
        'from_address',
        'to_address',
        'move_type',
        'message',
        'status',
        'quoted_amount',
        'admin_notes'
    ];

    protected $casts = [
        'move_date' => 'date',
        'quoted_amount' => 'decimal:2'
    ];

    public function invoice()
    {
        return $this->hasOne(Invoice::class);
    }
}
