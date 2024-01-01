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
        Schema::create('user_upgrades', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable(false);
            $table->unsignedBigInteger('upgrade_id')->nullable(false);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('upgrade_id')->references('id')->on('upgrades')->onDelete('cascade');
            $table->integer('current_buy_times')->nullable(false);
            $table->float('current_effect_value')->nullable(false);
            $table->decimal('current_cost')->nullable(false);
            $table->dateTime('bought_at')->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_upgrades');
    }
};
