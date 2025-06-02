<?php

namespace App\Repositories\Eloquent;

use App\Models\User;
use App\Repositories\Contracts\AuthInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Mockery\Exception;

class AuthRepositoryImpl implements AuthInterface
{
    private $user;
    public function __constructor(User $user){
        $this->user = $user;
    }

    public function login($credentials)
    {
        $token = Auth::guard('api')->attempt($credentials);
        return $token;

    }

    public function register($data)
    {
      $data =  User::create(
          [
              'name'=> $data['name'],
              'email' => $data['email'],
              'password' => Hash::make($data['password']),
          ]
      );
      return $data;

    }


}
