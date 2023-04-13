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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string("book_name",40);
            $table->string('autor_name',40);
            $table->string("publishing_house",40);
            $table->year('yaer');
            $table->double('copy');
            $table->integer('isbn');
            $table->string('file',255);
            $table->string('image_book',255);
            $table->foreignId('catogry')->constrained('catogry');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
