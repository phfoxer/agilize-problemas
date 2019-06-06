<?php
namespace App\Modules\General\BaseCep\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\General\BaseCep\Repositories\BaseCepRepository;

class BaseCepController extends Controller
{
    private $basecepRepository;

    function __construct(BaseCepRepository $basecepRepository ){
        $this->basecepRepository = $basecepRepository;
    }

    public function index(Request $request){
        try {
            $data =  $this->basecepRepository->index($request);
            return response()->json($data, 200);
        } catch(\Exception $e){
            $data = [
                "message"=> "Error, try again!",
                "text"=>    $e->getMessage()
            ];
            return response()->json($data, 401);
        }
    }

    public function show($id){
        try {
            $data = $this->basecepRepository->show($id);
            return response()->json($data, 200);
        } catch(\Exception $e){
            $data = [
                "message"=> "Error, try again!",
                "text"=>    $e->getMessage()
            ];
            return response()->json($data, 400);
        }
    }

    public function store(Request $request){
      
            $data = $this->basecepRepository->store($request);
            return response()->json($data, 200);
    
    }

    public function update(Request $request, $id){
        try {
            $data = $this->basecepRepository->update($request, $id);
            return response()->json($data, 200);
        } catch(\Exception $e){
            $data = [
                "message" => "Error, try again!",
                 "code" => $e->getCode(),
                "text" =>    $e->getMessage()
            ];
            return response()->json($data, ($e->getCode()==0) ? 400 : $e->getCode());
        }
    }

    public function destroy($id){
        try {
            $data = $this->basecepRepository->destroy($id);
            return response()->json($data, 200);
        } catch(\Exception $e){
            $data = [
                "message"=> "Error, try again!",
                "text"=>    $e->getMessage()
            ];
            return response()->json($data, 400);
        }
    }

}