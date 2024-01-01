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
        Schema::create('administrators', function (Blueprint $table) {
            $table->string       ('name'             )                             ; # Nome do administrador
            $table->string       ('email'            )->unique()                   ; # Email único do administrador.
            $table->string       ('user_image'       )->nullable(true)             ; # Imagem de perfil do administrador (nulo caso não queria ter imagem).
            $table->timestamp    ('email_verified_at')->nullable()                 ;
            $table->string       ('password'         )                             ; # Senha do administrador.
            $table->integer      ('permission_level' )->nullable(false)->default(0);
            $table->rememberToken(                   )                             ;
            $table->dateTime     ('banned_at'        )->nullable(true)             ; # Dia em que o administrador foi banido do sistema (nulo caso não seja banido).
            $table->timestamps   (                   )                             ;
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('administrators');
    }
};
