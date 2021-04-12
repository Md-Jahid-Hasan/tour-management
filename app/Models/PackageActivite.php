<?php

namespace App\Models;

use App\Models\Package;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PackageActivite extends Model
{
    use HasFactory;

    protected $fillable = [
        'activites_id'
    ];
}
