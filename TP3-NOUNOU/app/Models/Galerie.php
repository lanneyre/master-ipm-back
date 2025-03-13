<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Galerie extends Model
{
    /** @use HasFactory<\Database\Factories\GalerieFactory> */
    use HasFactory, SoftDeletes;

    public function animal()
    {
        return $this->belongsTo(Animal::class);
    }
}
