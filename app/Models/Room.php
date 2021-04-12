<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\Guest;
use App\Models\Hotel;
use App\Models\Customer;
use App\Models\RoomNumber;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'total_room', 'booking_room', 'capacity', 
        'type', 'description', 'available_room'
    ];

    public function customer(){
        return $this->hasMany(Guest::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

    public function room_number(){
        return $this->hasMany(RoomNumber::class);
    }

    public function hotel(){
        return $this->belongsTo(Hotel::class);
    }

}
