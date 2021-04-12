<?php

namespace App\Models;

use App\Models\Room;
use App\Models\RoomNumber;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Guest extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'phone_number', 'check_in', 'check_out', 'user_id', 'room_number_id'
    ];

    public function rooms(){
        return $this->belongsTo(Room::class, 'room_id')->with('room_number');
    }
}
