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
        Schema::create('book_details', function (Blueprint $table) {
            $table->id();
            $table->string('isbn');
            $table->unsignedBigInteger('author_id');
            $table->string('title');
            $table->string('publisher');
            $table->integer('publication_year');
            $table->string('genre');
            $table->text('description');
            $table->decimal('price', 8, 2);
            $table->integer('copies_sold');
            $table->timestamps();

            $table->foreign('author_id')->references('id')->on('authors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_details');
    }
};
