<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $table = 'bookings';

    protected $fillable = [
        'user_id',
        'room_id',
        'booking_date',
        'check_in_date',
        'check_out_date',
        'status',
    ];

    protected $casts = [
        'booking_date' => 'date',
        'check_in_date' => 'date',
        'check_out_date' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
    
    // Define the relationship with the Payment model
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
