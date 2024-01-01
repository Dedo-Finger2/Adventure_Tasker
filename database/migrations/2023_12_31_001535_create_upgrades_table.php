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
        Schema::create('upgrades', function (Blueprint $table) {
            $table->id();
            $table->string('name', 150)->nullable(false);
            $table->string('description', 255)->nullable(true);
            $table->string('cover_image', 255)->nullable(true);
            $table->integer('level_requirement')->nullable(false);
            $table->decimal('cost', 10, 2)->nullable(false);
            $table->float('cost_multiplier')->nullable(false);
            $table->integer('max_buy_times')->nullable(false);
            $table->string('effect', 100)->nullable(false);
            $table->float('effect_value')->nullable(false);
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
        Schema::dropIfExists('upgrades');
    }
};
