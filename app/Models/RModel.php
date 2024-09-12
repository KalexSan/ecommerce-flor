<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RModel extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    public $timestamps = true;// se eu quero trabalhar com timestamps
    public $incrementing = true;// que minhas tabale vão trabalhar com auto incremento
    protected $fillable = [];// campos que podem ser preenchidos

    //metodo que vai ser chamado antes de salvar os dados
    public function beforeSave(){

        return true;
           
    }

    public function save(array $options = [])
    {
        try {

            if (!$this->beforeSave()) {//se o metodo beforeSave retornar false
                return false;//retorna false
            }

            return parent::save($options);//salva os dados da model
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());//caso der um erro me retorna a mensagem de erro
        }
    }
}
