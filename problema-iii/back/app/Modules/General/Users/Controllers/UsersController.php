<?php
namespace App\Modules\General\Users\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\General\Users\Repositories\UsersRepository;
use App\Modules\General\Users\Models\Users;
use JWTAuth;

class UsersController extends Controller
{
    private $usersRepository;

    function __construct(UsersRepository $usersRepository ){
        $this->usersRepository = $usersRepository;
    }

    public function login(Request $request){
  
        $user = Users::where(['email'=>$request->email,'password'=>bcrypt($request->password)])->first();
        try {
            $token = ($user) ? JWTAuth::fromUser($user) : false;
            if ($token) {
                return response()->json(['userdata'=> $user,'token'=> $token],202);
            } else {
                return response()->json(['code' => 2, 'message' => 'Login ou senha incorretos.'], 401);
            }
        } catch (\JWTException $e){
            return response()->json(['code' => 2, 'message' => 'Login ou senha incorretos.'], 401);
        }

    }

    public function index(Request $request){
        try {
            $data =  $this->usersRepository->index($request);
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
            $data = $this->usersRepository->show($id);
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
        try {
            $data = $this->usersRepository->store($request);
            return response()->json($data, 200);
        } catch(\Exception $e){
            $data = [
                "message "=> "Error, try again!",
                "code" => $e->getCode(),
                "text "=>    $e->getMessage()
            ];
            return response()->json($data, ($e->getCode()==0) ? 400 : $e->getCode());
        }
    }

    public function update(Request $request, $id){
        try {
            $data = $this->usersRepository->update($request, $id);
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
            $data = $this->usersRepository->destroy($id);
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