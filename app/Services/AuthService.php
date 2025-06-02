<?php

namespace App\Services;

use App\Exceptions\Customs\InvalidCredentialException;
use App\Repositories\Contracts\AuthInterface;
use App\Repositories\Eloquent\AuthRepositoryImpl;
use Mockery\Exception;

class AuthService
{
    private $authRepositoryImpl;

    public function __construct(AuthInterface $authRepositoryImpl)
    {
       $this->authRepositoryImpl = $authRepositoryImpl;
    }

    public function login($credentials)
    {
         $token = $this->authRepositoryImpl->login($credentials);
         if(!$token)
         {
             throw new InvalidCredentialException("error al autenticar");
         }
         return [
             'acces_token'=> $token,
             'token_type'   => 'bearer',
         ];
    }

    public function register($data)
    {

           $user = $this->authRepositoryImpl->register($data);
        return [
            $user
        ];

    }

}
