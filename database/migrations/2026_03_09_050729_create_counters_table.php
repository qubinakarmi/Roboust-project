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
        Schema::create('counters', function (Blueprint $table) 
        {
            $table->id();
            $table->string('title', 191);
            $table->string('description', 255);
            $table->string('number', 20);
            $table->string('prefix', 20)->nullable();
            $table->string('suffix', 20)->nullable();
            $table->string('icon',255)->nullable();
            $table->boolean('status')->default(0);
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('counters');
    }
};
