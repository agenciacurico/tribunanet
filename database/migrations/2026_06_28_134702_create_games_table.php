<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('games', function (Blueprint $table) {

            $table->id();

            $table->foreignId('home_team_id')
                ->constrained('teams')
                ->cascadeOnDelete();

            $table->foreignId('away_team_id')
                ->constrained('teams')
                ->cascadeOnDelete();

            $table->date('game_date');

            $table->time('game_time');

            $table->string('venue')->nullable();

            $table->enum('status', [
                'scheduled',
                'live',
                'finished',
                'cancelled',
            ])->default('scheduled');

            $table->unsignedTinyInteger('current_set')->default(1);

            $table->foreignId('serving_team_id')
                ->nullable()
                ->constrained('teams')
                ->nullOnDelete();

            $table->timestamps();

            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};