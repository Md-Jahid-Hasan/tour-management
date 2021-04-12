<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomNumber extends Model
{
    use HasFactory;
    protected $fillable = [
        'number', 'check_in', 'check_out', 'room_id'
    ];

    public function room(){
        return $this->belongsTo(Room::class);
    }
}
