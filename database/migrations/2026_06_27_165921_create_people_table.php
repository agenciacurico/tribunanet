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
        Schema::create('people', function (Blueprint $table) {
            $table->id();

            $table->foreignId('organization_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('first_name', 100);

            $table->string('last_name', 100);

            $table->string('rut', 20)->nullable();

            $table->date('birth_date')->nullable();

            $table->enum('gender', ['M', 'F'])->nullable();

            $table->string('email')->nullable();

            $table->string('phone', 30)->nullable();

            $table->string('photo')->nullable();

            $table->boolean('active')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('people');
    }
};