<?php
namespace App\Modules\General\BaseCep\Repositories;
use App\Modules\General\BaseCep\Models\BaseCep;
use App\Modules\General\BaseCep\Repositories\BaseCepSearchRepository;
use Validator;
use Illuminate\Http\Request;

class BaseCepRepository
{
    private $basecepSearchRepository;
    function __construct(BaseCepSearchRepository $basecepSearchRepository){
        $this->basecepSearchRepository = $basecepSearchRepository;
    }

    public function index(Request $request){
        return $this->basecepSearchRepository->search(BaseCep::with([]), $request);
    }

    public function show($id){
    	return BaseCep::where(["id"=>$id])->first();
    }

    public function store($request){
        $validator = Validator::make($request->all(), [
            "cep"=>"nullable",
            "logradouro"=>"nullable",
            "complemento"=>"nullable",
            "bairro"=>"nullable",
            "localidade"=>"nullable",
            "uf"=>"nullable",
            "unidade"=>"nullable",
            "ibge"=>"nullable",
            "gia"=>"nullable",
        ]);
        if($validator->fails()){
            throw new \Exception("invalid_fields",400);
        } else {
            $data = [
            "cep"=>$request->cep,
            "logradouro"=>$request->logradouro,
            "complemento"=>$request->complemento,
            "bairro"=>$request->bairro,
            "localidade"=>$request->localidade,
            "uf"=>$request->uf,
            "unidade"=>$request->unidade,
            "ibge"=>$request->ibge,
            "gia"=>$request->gia,
            ];
            return BaseCep::create($data);
        }
    }

    public function update($request, $id){
        $validator = Validator::make($request->all(), [
            "cep"=>"nullable",
            "logradouro"=>"nullable",
            "complemento"=>"nullable",
            "bairro"=>"nullable",
            "localidade"=>"nullable",
            "uf"=>"nullable",
            "unidade"=>"nullable",
            "ibge"=>"nullable",
            "gia"=>"nullable",
        ]);
        if($validator->fails()){
            throw new \Exception("invalid_fields",400);
        } else {
            $data = [
            "cep"=>$request->cep,
            "logradouro"=>$request->logradouro,
            "complemento"=>$request->complemento,
            "bairro"=>$request->bairro,
            "localidade"=>$request->localidade,
            "uf"=>$request->uf,
            "unidade"=>$request->unidade,
            "ibge"=>$request->ibge,
            "gia"=>$request->gia,
            ];
            return BaseCep::where(["id"=>$id])->update($data);
        }
    }

    public function destroy($id){
    	return BaseCep::where(["id"=>$id])->delete();
    }

}