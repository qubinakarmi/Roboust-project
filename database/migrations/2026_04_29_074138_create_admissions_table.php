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
        Schema::create('admissions', function (Blueprint $table) {
            $table->id();
            $table->string('fullname', 255);
            $table->string('email', 255);
            $table->string('phone', 255);
            $table->foreignId('course_id')->constrained('courses')->cascadeOnDelete();
            $table->string('start_date', 255);
            $table->string('address', 255);
            $table->string('message', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admissions');
    }
};
