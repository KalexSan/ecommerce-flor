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
        Schema::create('itens_pedidos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('quantidade');
            $table->decimal('valor', 10, 2);
            $table->datetime('dt_item');
            $table->integer('produto_id')->unsigned();// preciso refenciar a chave estrangeira
            $table->integer('pedido_id')->unsigned();// preciso refenciar a chave estrangeira
            $table->timestamps();

            $table->foreign('produto_id')->references('id')->on('produtos')->onDelete('cascade');// onDelete('cascade') vai deletar todos os itens_pedidos que estão relacionados com o produto que será deletado
            $table->foreign('pedido_id')->references('id')->on('pedidos')->onDelete('cascade');// onDelete('cascade') vai deletar todos os itens_pedidos que estão relacionados com o pedido que será deletado
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('itens_pedidos');
    }
};
