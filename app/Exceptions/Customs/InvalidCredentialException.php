<?php

namespace App\Exceptions\Customs;

use Exception;

class InvalidCredentialException extends Exception
{
    public function render($response)
    {
       return response()->json(
           [
               'error'=> 'unauthorized',
               'message'=>$this->getMessage() ?: 'Credenciales invalidas'

       ], 401);
    }
}
