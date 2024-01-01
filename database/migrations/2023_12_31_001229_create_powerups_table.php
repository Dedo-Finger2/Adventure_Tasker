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
        Schema::create('powerups', function (Blueprint $table) {
            $table->id();
            $table->string('name', 150)->nullable(false);
            $table->string('description', 255)->nullable(true);
            $table->string('cover_image', 255)->nullable(true);
            $table->decimal('cost', 10, 2)->nullable(false);
            $table->integer('max_uses')->nullable(false);
            $table->string('effect', 50)->nullable(false); # XP, MONEY, ETC.
            $table->float('effect_multiplier')->nullable(false);
            $table->dateTime('deleted_at')->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('powerups');
    }
};
