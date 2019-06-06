<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        if($exception instanceOf \Tymon\JWTAuth\Exceptions\JWTException){
            return response()->json([
                "message"   => $exception->getMessage(),
                "code"      => $exception->getStatusCode()
            ], $exception->getStatusCode());
        }
        if($exception instanceOf \Symfony\Component\HttpKernel\Exception){
            return response()->json([
                "message"=>$exception->getMessage(),
                "code"=>200
            ],$exception->getStatusCode());
        }
        if($exception instanceOf \Illuminate\Database\Eloquent\RelationNotFoundException){
            return response()->json([
                "message"=>$exception->getMessage(),
                "code"=>401
            ],401);
        }
        if($exception instanceOf \Symfony\Component\HttpKernel\Exception\NotFoundHttpException){
            return response()->json([
                "message"=>'Route not found',
                'code'=>404
            ],404);
        }
        if($exception instanceOf \Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException){
            return response()->json([
                "message"=>'Method not allowned',
                "description"=>'A request method is not supported for the requested resource; for example, a GET request on a form that requires data to be presented via POST, or a PUT request on a read-only resource.',
                'code'=>405
            ],405);
        }
        if($exception instanceOf \Symfony\Component\Debug\Exception\FatalThrowableError){
            return response()->json([
                "message"=>$exception->getMessage(),
                "description"=>'Please, contact api administrator',
                'code'=>500
            ],500);
        }
        if($exception instanceOf \Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException){
            return response()->json([
                "message"=>$exception->getMessage(),
                "description"=>'Code 498 indicates an expired or otherwise invalid token.',
                'code'=>498
            ],498);
        }
        if($exception instanceOf \Illuminate\Database\QueryException){
            return response()->json([
                "message"=>$exception->getMessage(),
                "description"=>'Code 498 indicates an expired or otherwise invalid token.',
                'code'=>498
            ],498);
        }
        if($exception instanceOf \ReflectionException){
            return response()->json([
                "message"=>$exception->getMessage(),
                "description"=>"A ReflectionException occurs when there's an error while performing any sort of reflection; specifically when dealing with the Reflector, or with other classes that inherit from it.",
                'code'=>498
            ],498);
        }

        if($exception instanceOf \InvalidArgumentException){
            return response()->json([
                "message"=>$exception->getMessage(),
                "description"=>"The request was well-formed but was unable to be followed due to semantic errors.",
                'code'=>422
            ],422 );
        }
        return parent::render($request, $exception);
    }
}