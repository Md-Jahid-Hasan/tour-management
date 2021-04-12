<?php

namespace App\Models;

use App\Models\Package;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Activites extends Model
{
    use HasFactory;
    protected $fillable  = [
        'name', 'description', 'ratings'
    ];

    public function packages(){
        return $this->belongsToMany(Package::class, 'package_activites');
    }
}
