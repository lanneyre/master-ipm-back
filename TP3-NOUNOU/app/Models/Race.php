<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Race extends Model
{
    /** @use HasFactory<\Database\Factories\RaceFactory> */
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'nom',
        'caracteristiques',
        'espece_id'
    ];

    public function animals()
    {
        return $this->hasMany(Animal::class, "race");
    }

    public function espece()
    {
        return $this->belongsTo(Espece::class, 'espece_id');
    }
}
