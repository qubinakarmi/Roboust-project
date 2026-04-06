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
         Schema::table('pages', function (Blueprint $table) {
        $table->string('meta_title')->after('image');
        $table->text('meta_keywords')->after('meta_title');
        $table->string('meta_description', 200)->after('meta_keywords');
        $table->string('meta_image')->after('meta_description');
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pages', function (Blueprint $table) {
            $table->dropColumn([
                'meta_title',
                'meta_keywords',
                'meta_description',
                'meta_image'
            ]);
        });
    }
};
