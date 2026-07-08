<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('games', function (Blueprint $table) {

            $table->foreignId('featured_team_member_id')
                ->nullable()
                ->after('serving_team_id')
                ->constrained('team_members')
                ->nullOnDelete();

            $table->timestamp('featured_until')
                ->nullable()
                ->after('featured_team_member_id');

        });
    }

    public function down(): void
    {
        Schema::table('games', function (Blueprint $table) {

            $table->dropForeign(['featured_team_member_id']);
            $table->dropColumn('featured_team_member_id');
            $table->dropColumn('featured_until');

        });
    }
};