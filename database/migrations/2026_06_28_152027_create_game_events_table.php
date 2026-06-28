<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('game_events', function (Blueprint $table) {

            $table->id();

            $table->foreignId('game_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('game_set_id')
                ->nullable()
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('team_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->foreignId('player_id')
                ->nullable()
                ->constrained('people')
                ->nullOnDelete();

            $table->enum('event_type', [
                'point',
                'timeout',
                'substitution',
                'yellow_card',
                'red_card',
                'serve',
                'undo',
            ]);

            $table->integer('value')->default(1);

            $table->json('data')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('game_events');
    }
};