<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Galerie extends Model
{
    /** @use HasFactory<\Database\Factories\GalerieFactory> */
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'animal_id',
        'legende',
        'chemin'
    ];

    public function animal()
    {
        return $this->belongsTo(Animal::class);
    }
}
