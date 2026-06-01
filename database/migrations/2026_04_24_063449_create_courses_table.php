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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->string('slug', 255)->nullable();
            $table->string('sub_title', 255);
            $table->text('short_desc');
            $table->string('duration', 255);
            $table->string('image', 255);
            $table->text('course_info')->nullable();
            $table->text('career_outcome')->nullable();
            $table->text('tool')->nullable();
            $table->text('certification')->nullable();
            $table->text('benefits')->nullable();
            $table->string('video', 255)->nullable();
            $table->boolean('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
