<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $table = 'rooms';

    protected $fillable = [
        'hostel_id',
        'room_number',
        'room_type',
        'price',
        'capacity',
        'available',
    ];

    public function hostel()
    {
        return $this->belongsTo(Hostel::class);
    }

    /**
     * Get the bookings for the room.
     */
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
    
}
