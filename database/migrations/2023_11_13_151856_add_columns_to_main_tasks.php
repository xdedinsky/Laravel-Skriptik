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
        Schema::table('main_tasks', function (Blueprint $table) {
            $table->integer('level');
            $table->string('name');
            $table->string('description');
            $table->string('result');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('main_tasks', function (Blueprint $table) {
            $table->dropColumn('level');
            $table->dropColumn('name');
            $table->dropColumn('description');
            $table->dropColumn('result');
        });
    }
};
