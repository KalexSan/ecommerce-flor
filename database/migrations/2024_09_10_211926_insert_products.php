<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        $cat = new \App\Models\Categoria(['categoria'=>'Geral']);
        $cat->save();

        $cat = new \App\Models\Categoria(['categoria'=>'Rosa']);
        $cat->save();

        $cat = new \App\Models\Categoria(['categoria'=>'Trepadeira']);
        $cat->save();

        $prod1 = new \App\Models\Produto(['nome'=>'Rosa Vermelha', 'valor'=>60, 'foto'=>'imagens/produto1.jpg', 'descricao'=>'', 'categoria_id'=>'2']);
        $prod1->save();

        $prod2 = new \App\Models\Produto(['nome'=>'Rosa Branca', 'valor'=>80, 'foto'=>'imagens/produto2.jpg', 'descricao'=>'', 'categoria_id'=>'2']);
        $prod2->save();
        
        $prod3 = new \App\Models\Produto(['nome'=>'Buganvilia', 'valor'=>45, 'foto'=>'imagens/produto3.jpg', 'descricao'=>'', 'categoria_id'=>'3']);
        $prod3->save();

        $prod4 = new \App\Models\Produto(['nome'=>'Magnolia', 'valor'=>70, 'foto'=>'imagens/produto4.jpg', 'descricao'=>'', 'categoria_id'=>'1']);
        $prod4->save();

        $prod5 = new \App\Models\Produto(['nome'=>'Ype Roxo', 'valor'=>40, 'foto'=>'imagens/produto5.jpg', 'descricao'=>'', 'categoria_id'=>'1']);
        $prod5->save();

        $prod6 = new \App\Models\Produto(['nome'=>'Azaleia', 'valor'=>50, 'foto'=>'imagens/produto6.jpg', 'descricao'=>'', 'categoria_id'=>'3']);
        $prod6->save();

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
