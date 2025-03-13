<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Critere extends Model
{
    /** @use HasFactory<\Database\Factories\CritereFactory> */
    use HasFactory, SoftDeletes;

    public function animals()
    {
        return $this->belongsToMany(Animal::class, "animal_critere");
    }
}
