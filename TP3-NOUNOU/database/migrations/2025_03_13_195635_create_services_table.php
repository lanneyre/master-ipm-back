<?php

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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->text("titre");
            $table->text("description");
            $table->float("prix", 2);
            $table->timestamps();
            $table->softDeletes();
        });
        DB::statement("ALTER TABLE services ADD icon LONGBLOB NULL DEFAULT NULL");
        DB::statement("ALTER TABLE services ADD img1 LONGBLOB NULL DEFAULT NULL");
        DB::statement("ALTER TABLE services ADD img2 LONGBLOB NULL DEFAULT NULL");
        DB::statement("ALTER TABLE services ADD img3 LONGBLOB NULL DEFAULT NULL");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
