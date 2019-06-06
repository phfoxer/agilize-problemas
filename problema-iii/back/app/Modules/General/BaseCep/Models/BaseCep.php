<?php
namespace App\Modules\General\BaseCep\Models;
use Illuminate\Database\Eloquent\Model;

class BaseCep extends Model
{
    protected $table    = "base_cep";
    protected $fillable = ['id','cep','logradouro','complemento','bairro','localidade','uf','unidade','ibge','gia'];
    protected $visible = ['id','cep','logradouro','complemento','bairro','localidade','uf','unidade','ibge','gia'];

}