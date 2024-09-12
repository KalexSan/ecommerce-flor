<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Usuario extends Authenticatable {    

    use HasFactory;
    
    protected $primaryKey = 'id';
    public $timestamps = true;// se eu quero trabalhar com timestamps
    public $incrementing = true;// que minhas tabale vão trabalhar com auto incremento

    protected $table = 'usuarios';

    protected $fillable = [
        'nome',
        'email',
        'login',
        'password'
    ];

    protected $hidden = [
        'password'
    ];


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

    public function endereco(){
        return $this->hasOne(Endereco::class, 'usuario_id');
    }

    //public function setLoginAttribute($login){
        //$value = preg_replace('/[^0-9]/', '', $login);
        //$this->attributes['login'] = $value;
        
    //}
}
