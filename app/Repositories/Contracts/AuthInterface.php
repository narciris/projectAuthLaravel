<?php

namespace App\Repositories\Contracts;

interface AuthInterface
{
   public function login($credentials);
   public function register($data);
}
