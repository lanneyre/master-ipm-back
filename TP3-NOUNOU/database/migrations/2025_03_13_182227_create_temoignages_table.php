<?php

use App\Models\Animal;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('temoignages', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class, "user")->nullable()->constrained();
            $table->foreignIdFor(Animal::class, "animal")->nullable()->constrained();
            $table->text("titre");
            $table->text("texte");
            $table->unsignedTinyInteger("note");
            $table->timestamps();
            $table->softDeletes();
        });
        DB::statement("ALTER TABLE temoignages ADD img1 LONGBLOB NULL DEFAULT NULL");
        DB::statement("ALTER TABLE temoignages ADD img2 LONGBLOB NULL DEFAULT NULL");
        DB::statement("ALTER TABLE temoignages ADD img3 LONGBLOB NULL DEFAULT NULL");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('temoignages');
    }
};
