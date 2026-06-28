<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('game_sets', function (Blueprint $table) {

            $table->id();

            $table->foreignId('game_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->unsignedTinyInteger('set_number');

            $table->unsignedTinyInteger('home_score')->default(0);

            $table->unsignedTinyInteger('away_score')->default(0);

            $table->foreignId('winner_team_id')
                ->nullable()
                ->constrained('teams')
                ->nullOnDelete();

            $table->timestamp('started_at')->nullable();

            $table->timestamp('finished_at')->nullable();

            $table->timestamps();

            $table->unique(['game_id', 'set_number']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('game_sets');
    }
};