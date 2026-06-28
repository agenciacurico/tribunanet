<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('games', function (Blueprint $table) {

            // Hora real de inicio del partido
            $table->timestamp('started_at')
                ->nullable()
                ->after('status');

            // Hora real de término
            $table->timestamp('ended_at')
                ->nullable()
                ->after('started_at');

        });
    }

    public function down(): void
    {
        Schema::table('games', function (Blueprint $table) {

            $table->dropColumn([
                'started_at',
                'ended_at',
            ]);

        });
    }
};