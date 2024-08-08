<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'payments';

    protected $fillable = [
        'booking_id',
        'amount',
        'payment_date',
        'payment_method',
        'status',
    ];

    // The attributes that should be cast to native types.
    protected $casts = [
        'payment_date' => 'datetime'
    ];

    // Define the relationship with the Booking model
    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
}
