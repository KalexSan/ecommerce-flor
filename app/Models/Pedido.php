<?php

namespace App\Models;



class Pedido extends RModel
{
    protected $table = 'pedidos';
    protected $dates = ['data_pedido'];
    protected $fillable = ['data_pedido', 'status', 'usuario_id'];

   public function statusDesc(){
    $desc = '';

    switch($this->status){
        case 'PEN': $desc = 'PENDENTE'; break;
        case 'APR': $desc = 'APROVADO'; break;   
        case 'CAN': $desc = 'CANCELADO'; break;
    }

    return $desc;

   }
}
