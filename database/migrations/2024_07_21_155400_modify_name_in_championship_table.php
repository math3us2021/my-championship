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
        Schema::table('championship', function (Blueprint $table) {
            $table->dropUnique(['name']);
            $table->string('name')->nullable()->unique()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('championship', function (Blueprint $table) {
            $table->dropUnique(['name']);
            $table->string('name')->nullable(false)->unique()->change();
        });
    }
};
