<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('team_members', function (Blueprint $table) {

            $table->id();

            $table->foreignId('team_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('person_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->unsignedTinyInteger('jersey_number');

            $table->enum('position', [
                'Armador',
                'Opuesto',
                'Punta',
                'Central',
                'Líbero',
            ]);

            $table->boolean('captain')->default(false);

            $table->boolean('starter')->default(false);

            $table->boolean('active')->default(true);

            $table->timestamps();

            $table->unique(['team_id', 'person_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('team_members');
    }
};