<?php

use App\Models\Animal;
use App\Models\Critere;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //
        Schema::create('criteres_animals', function (Blueprint $table) {
            $table->foreignIdFor(Critere::class)->constrained();
            $table->foreignIdFor(Animal::class)->constrained();
            $table->timestamps();
            $table->softDeletes();
            $table->primary(["critere_id", "animal_id"]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
