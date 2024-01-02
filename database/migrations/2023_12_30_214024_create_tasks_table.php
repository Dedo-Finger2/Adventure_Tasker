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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title', 150)->nullable(false);
            $table->string('description',255)->nullable(true);
            $table->float('exp')->nullable(false);
            $table->decimal('money', 10, 2)->nullable(false);
            $table->date('due_date')->nullable(true);
            $table->boolean('overdue')->default(false);
            $table->boolean('recurring')->default(false);
            $table->integer('recurring_type')->nullable(true)->default(0);

            $table->unsignedBigInteger('task_id')->nullable(true);
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('difficulty_id');
            $table->unsignedBigInteger('priority_id');

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('task_id')->references('id')->on('tasks')->onDelete('cascade');
            $table->foreign('priority_id')->references('id')->on('priorities')->onDelete('cascade');
            $table->foreign('difficulty_id')->references('id')->on('difficulties')->onDelete('cascade');

            $table->timestamp('deleted_at')->nullable(true);
            $table->timestamp('completed_at')->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
