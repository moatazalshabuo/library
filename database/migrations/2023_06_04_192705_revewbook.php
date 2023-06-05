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
        Schema::create("revewbook",function(Blueprint $table){
            $table->id();
            $table->foreignId("book_id")->constrained("books");
            $table->foreignId("user_id")->constrained("users");
            $table->integer("revew")->nullable();
            $table->text("descripe")->nullable();
            $table->text("descripe_to")->nullable();
            $table->tinyInteger("stauts")->default(0);
            $table->timestamps();
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
