<?php

namespace App\Models;

use App\Models\Hotel;
use App\Models\Package;
use App\Models\Activites;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Place extends Model
{
    use HasFactory;

    protected $fillable  = [
        'divison', 'tourist_spot', 'description'
    ];

    public function activites(){
        return $this->hasMany(Activites::class);
    }

    public function packages(){
        return $this->hasMany(Package::class);
    }

    public function hotel(){
        return $this->hasMany(Hotel::class);
    }
}
