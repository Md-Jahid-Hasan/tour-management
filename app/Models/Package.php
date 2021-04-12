<?php

namespace App\Models;

use App\Models\Place;
use App\Models\PackageActivite;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Package extends Model
{
    use HasFactory;

    protected $fillable  = [
        'name', 'description', 'price', 'start_date', 'end_date'
    ];

    public function activites(){
        return $this->belongsToMany(Activites::class, 'package_activites');
    }

    public function place(){
        return $this->hasMany(Place::class);
    }
}
