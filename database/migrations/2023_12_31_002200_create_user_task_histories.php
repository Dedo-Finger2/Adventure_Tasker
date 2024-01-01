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
        Schema::create('user_task_histories', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('task_id')->nullable(false);
            $table->unsignedBigInteger('user_id')->nullable(false);
            
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('task_id')->references('id')->on('tasks')->onDelete('cascade');

            $table->string('action_type', 150)->nullable(false);
            $table->string('action_description', 255)->nullable(true);
            $table->dateTime('action_date')->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_task_histories');
    }
};
