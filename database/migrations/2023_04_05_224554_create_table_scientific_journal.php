<?php

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
        Schema::create('scientific_journal', function (Blueprint $table) {
            $table->id();
            $table->string("scientific_name");
            $table->string('scientific_place');
            $table->string('name_reserch');
            $table->double("issn");
            $table->string('file',255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_scientific_journal');
    }
};
