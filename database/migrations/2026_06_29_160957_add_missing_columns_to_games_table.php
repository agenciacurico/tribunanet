<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('games', function (Blueprint $table) {

            // Torneo (opcional, sin foreign key por ahora)
            $table->unsignedBigInteger('tournament_id')
                ->nullable()
                ->first();

            // Categoría (sí existe la tabla categories)
            $table->foreignId('category_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete()
                ->after('tournament_id');

        });
    }

    public function down(): void
    {
        Schema::table('games', function (Blueprint $table) {

            $table->dropConstrainedForeignId('category_id');
            $table->dropColumn('tournament_id');

        });
    }
};