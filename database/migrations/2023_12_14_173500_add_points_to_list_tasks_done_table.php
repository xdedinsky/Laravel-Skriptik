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
        Schema::table('list_tasks_done', function (Blueprint $table) {
            $table->integer('points')->default(0); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
{
    Schema::table('list_tasks_done', function (Blueprint $table) {
        $table->dropColumn('points'); 
    });
}

};
