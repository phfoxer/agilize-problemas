<?php
namespace App\Modules\General\BaseCep\Repositories;
use App\Modules\General\BaseCep\Models\BaseCep;

use Illuminate\Http\Request;

class BaseCepSearchRepository
{
    public function search($queryBuilder, $request){

    if ($request->id) {
        $queryBuilder->where("id","=",$request->id);
    }

    if ($request->cep) {
        $queryBuilder->where("cep","=",$request->cep);
    }

    if ($request->logradouro) {
        $queryBuilder->where("logradouro","=",$request->logradouro);
    }

    if ($request->complemento) {
        $queryBuilder->where("complemento","=",$request->complemento);
    }

    if ($request->bairro) {
        $queryBuilder->where("bairro","=",$request->bairro);
    }

    if ($request->localidade) {
        $queryBuilder->where("localidade","=",$request->localidade);
    }

    if ($request->uf) {
        $queryBuilder->where("uf","=",$request->uf);
    }

    if ($request->unidade) {
        $queryBuilder->where("unidade","=",$request->unidade);
    }

    if ($request->ibge) {
        $queryBuilder->where("ibge","=",$request->ibge);
    }

    if ($request->gia) {
        $queryBuilder->where("gia","=",$request->gia);
    }

        return $queryBuilder->paginate(($request->count) ? $request->count : 20);
    }
}