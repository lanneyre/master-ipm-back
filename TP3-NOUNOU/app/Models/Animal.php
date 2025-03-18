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

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'nom',
        'description',
        'dob',
        'sexe',
        'race',
        'race_pere',
        'race_mere'
    ];


    public function raceAnimal()
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

    // public function espece()
    // {
    //     return $this->hasOneThrough(Espece::class, Race::class,  "id", "id", "race_id", "espece_id");
    //     //return Espece::where("espece_id", $this->race->espece_id);
    // }
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

    public static function vedettes(): array
    {
        $especes = Espece::all();
        $vedettes = [];
        foreach ($especes as $espece) {
            # code...
            $race = Race::where("espece_id", $espece->id)->inRandomOrder()->first();

            $vedettes[] = ["Espece" => $espece, "Race" => $race, "Animal" => Animal::with(['galeries'])->where("race", $race->id)->inRandomOrder()->first()];
        }
        return $vedettes;
    }
}
