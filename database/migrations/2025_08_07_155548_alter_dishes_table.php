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
        //
         Schema::table('dishes', function (Blueprint $table) {
            $table->dropColumn('preparation_time');
            $table->dropColumn('spice_level');
            $table->dropColumn('ingredients');
            $table->dropColumn('calories');
         });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
