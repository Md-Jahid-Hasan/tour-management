<?php

namespace App\Models;

use App\Models\Room;
use App\Models\Place;
use App\Models\RoomNumber;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Hotel extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'place_id', 'description', 'rating'
    ];

    public function rooms(){
        return $this->hasMany(Room::class);
    }

    public function room_number(){
        return $this->hasManyThrough(RoomNumber::class, Room::class);
    }

    public function location(){
        return $this->belongsTo(Place::class, 'place_id');
    }
}
