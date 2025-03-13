<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Animal extends Model
{
    /** @use HasFactory<\Database\Factories\AnimalFactory> */
    use HasFactory;
    use SoftDeletes;


    public function race()
    {
        return $this->belongsTo(Race::class, 'race');
    }
    public function race_mere()
    {
        return $this->belongsTo(Race::class, 'race_mere');
    }
    public function race_pere()
    {
        return $this->belongsTo(Race::class, 'race_pere');
    }

    //$table->foreignIdFor(Animal::class)->constrained();
    public function galeries()
    {
        return $this->hasMany(Galerie::class);
    }

    public function criteres()
    {
        return $this->belongsToMany(Critere::class, "animal_critere");
    }

    public function statuses()
    {
        return $this->belongsToMany(Status::class, "status_animals");
    }
}
