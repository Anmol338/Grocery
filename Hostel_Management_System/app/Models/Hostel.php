<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hostel extends Model
{
    use HasFactory;

    protected $table = 'hostels';

    protected $fillable = [
        'user_id',
        'name', 
        'address',
        'description',
    ];

    /**
     * Get the user that owns the hostel.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function rooms()
    {
        return $this->hasMany(Room::class);
    }
}
