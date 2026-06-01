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
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('page_content_id')
          ->constrained('page_contents')
          ->onDelete('cascade');
            $table->string('title', 255);
            $table->string('slug', 255);
            $table->string('sub_title', 255);
            $table->string('short_content', 255);
            $table->text('detail_content');
            $table->text('image');
            $table->boolean('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};
