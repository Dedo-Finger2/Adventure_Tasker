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
        /**
         * Criação da tabela de atributos dos usuários.
         */
        Schema::create('user_attributes', function (Blueprint $table) {
            $table->id();
            // Chave estrangeira
            $table->unsignedBigInteger('user_id')->nullable(false);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            // Atributos
            $table->integer('current_level'               )->nullable(false)               ;
            $table->integer('max_level'                   )->nullable(false)               ;
            $table->decimal('current_exp'          , 10, 2)->nullable(false)               ;
            $table->decimal('exp_next_level'       , 10, 2)->nullable(false)               ;
            $table->decimal('current_money'        , 10, 2)->nullable(false)               ;
            $table->integer('rebirth_level'               )->nullable(false)->default(0)   ;
            $table->integer('max_bag_slots'               )->nullable(false)->default(1)   ;
            $table->integer('max_powerups_at_time'        )->nullable(false)->default(1)   ; # Quantidade máxima de power-ups que o usuário pode ter ativado ao mesmo tempo (seus efeitos acumulam).
            $table->integer('max_powerups_a_day'          )->nullable(false)->default(2)   ; # Quantidade máxima de power-ups que o usuário pode comprar por dia.
            $table->float  ('overdue_debuff_value'        )->nullable(false)->default(0.25); # Quantidade, em porcentagem, que será aplicada na redução de recompensas das tarefas fora do prazo.
            $table->float  ('sub_task_debuff_value'       )->nullable(false)->default(0.25); # Quantidade, em porcentagem, que será aplicada na redução de recompensas das sub-tarefas por padrão.
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_attributes');
    }
};
