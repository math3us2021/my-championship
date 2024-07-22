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
        Schema::create('matches_played', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('championship_id');
            $table->enum('stage', ['quartas de final', 'semifinais', 'final', 'disputa do 3º lugar']); // Fase do campeonato
            $table->unsignedBigInteger('team1_id');
            $table->unsignedBigInteger('team2_id');
            $table->integer('team1_score');
            $table->integer('team2_score');
            $table->integer('team1_penalties');
            $table->integer('team2_penalties');
            $table->integer('team1_points');
            $table->integer('team2_points');
            $table->date('match_date');
            $table->timestamps();


            $table->foreign('championship_id')->references('id')->on('championships')->onDelete('cascade');
            $table->foreign('team1_id')->references('id')->on('teams')->onDelete('cascade');
            $table->foreign('team2_id')->references('id')->on('teams')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matches_played');
    }
};
