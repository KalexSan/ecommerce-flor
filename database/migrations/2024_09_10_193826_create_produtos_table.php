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
        Schema::create('produtos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 100);
            $table->decimal('valor', 10, 2);
            $table->string('foto', 100)->nullable();
            $table->string('descricao', 255)->nullable();
            $table->integer('categoria_id')->unsigned();// preciso refenciar a chave estrangeira
            $table->timestamps();

            $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('cascade');// onDelete('cascade') vai deletar todos os produtos que estão relacionados com a categoria que será deletada

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produtos');
    }
};
