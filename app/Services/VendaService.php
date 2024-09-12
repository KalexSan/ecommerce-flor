<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;
use App\Models\Usuario;
use App\Models\Pedido;
use App\Models\ItensPedido;
use DateTime;
use Illuminate\Support\Facades\DB;



class VendaService {

    public function finalizarVenda($prods = [], Usuario $user){
        
        try {
            DB::beginTransaction();

            $dtHoje = new DateTime();
            $pedido = new Pedido();

            $pedido->data_pedido = $dtHoje->format('Y-m-d H:i:s');
            $pedido->status = "PEN";
            $pedido->usuario_id = $user->id;

            $pedido->save();


            foreach ($prods as $p) {
        
                $itensPedido = new ItensPedido();
                $itensPedido->quantidade = 1;
                $itensPedido->valor = $p['valor'];
                $itensPedido->dt_item = $dtHoje->format('Y-m-d H:i:s');
                $itensPedido->produto_id = $p['id'];
                $itensPedido->pedido_id = $pedido->id;

                $itensPedido->save();
            }
            DB::commit();
            return ['status'=> 'sucesso', 'message' => 'Venda finalizada com sucesso'];
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error("Erro ao finalizar venda: ", ['message' => $e->getMessage()]);
            return ['status'=> 'error', 'message' => 'Erro ao finalizar venda'];
        }

    }


}