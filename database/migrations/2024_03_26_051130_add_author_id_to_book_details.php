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
        Schema::table('book_details', function (Blueprint $table) {
            $table->unsignedBigInteger('author_id')->after('isbn')->nullable();
            $table->foreign('author_id')->references('id')->on('authors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('book_details', function (Blueprint $table) {
            //
            $table->dropForeign(['author_id']);
            $table->dropColumn('author_id');
        });
    }
};
