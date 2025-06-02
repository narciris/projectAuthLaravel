<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Http\Requests\RegisterUser;
use App\Services\AuthService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    private $authService;
    public function __construct(AuthService $authService)
    {
      $this->authService = $authService;
    }

    public function  login(AuthRequest $request)
    {
        try {
            $credentials = $request->only('email', 'password');
            $data = $this->authService->login($credentials);
            return response()->json($data, 200);
        }catch (\Exception $exception){
            return response()->json(['message' => $exception->getMessage()], 500);
        }
    }


    public function register(RegisterUser $request)
    {
        try {
            $validate = $request->validated();
          $response =  $this->authService->register($validate);
           return response()->json($response,201);
        }catch (\Exception $exception){
            return response()->json(['message' => $exception->getMessage()], 500);
        }
    }
}
