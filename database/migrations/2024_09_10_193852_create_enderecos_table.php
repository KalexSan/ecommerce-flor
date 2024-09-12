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
        Schema::create('enderecos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('logradouro', 100)->nullable();
            $table->string('numero', 10)->nullable();
            $table->string('cidade', 50)->nullable();
            $table->string('cep', 50);
            $table->string('complemento', 50)->nullable();
            $table->string('estado', 50)->nullable();
            $table->integer('usuario_id')->unsigned();// preciso refenciar a chave estrangeira

            $table->timestamps();

            $table->foreign('usuario_id')->references('id')->on('usuarios')->onDelete('cascade');// onDelete('cascade') vai deletar todos os endereços que estão relacionados com o usuário que será deletado
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enderecos');
    }
};
