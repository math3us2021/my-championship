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
        Schema::create('championship_team', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('championship_id');
            $table->unsignedBigInteger('team_id');
            $table->timestamps();

            $table->foreign('championship_id')->references('id')->on('championships')->onDelete('cascade');
            $table->foreign('team_id')->references('id')->on('teams')->onDelete('cascade');

            $table->unique(['championship_id', 'team_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('championship_team');
    }
};
