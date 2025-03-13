<?php

use App\Models\Status;
use App\Models\Animal;
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
        Schema::create('status_animals', function (Blueprint $table) {
            $table->foreignIdFor(Status::class)->constrained();
            $table->foreignIdFor(Animal::class)->constrained();
            $table->date("date")->useCurrent();
            $table->timestamps();
            $table->softDeletes();
            $table->primary(["status_id", "animal_id", "date"]);
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
