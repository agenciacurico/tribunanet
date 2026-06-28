<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Ejecutar la migración.
     */
    public function up(): void
    {
        Schema::table('games', function (Blueprint $table) {

            $table->unsignedTinyInteger('sets_to_win')
                ->default(3);

        });
    }

    /**
     * Revertir la migración.
     */
    public function down(): void
    {
        Schema::table('games', function (Blueprint $table) {

            $table->dropColumn('sets_to_win');

        });
    }
};