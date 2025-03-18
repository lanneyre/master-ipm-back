<?php

use App\Models\Race;
use App\Models\Status;
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
        Schema::create('animals', function (Blueprint $table) {
            $table->id();
            $table->text("nom");
            $table->text("description")->nullable();
            $table->date("dob")->nullable();
            $table->text("sexe");
            $table->foreignIdFor(Race::class, "race")->nullable()->constrained();
            $table->foreignIdFor(Race::class, "race_mere")->nullable()->constrained();
            $table->foreignIdFor(Race::class, "race_pere")->nullable()->constrained();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('animals');
    }
};
