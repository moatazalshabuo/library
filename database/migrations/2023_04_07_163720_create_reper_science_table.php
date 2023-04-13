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
        Schema::create('reper_science', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('sp_id');
            $table->string("sp_name",40);
            $table->boolean("status")->default(0);
            $table->string('emz',30);
            $table->date('year_post');            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reper_science');
    }
};
