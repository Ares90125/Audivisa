<?php

namespace App\Http\Controllers\Student\Auth;

use App\Http\Controllers\AuthController as BaseAuthController;

class LoginController extends BaseAuthController
{
    public function __construct()
    {
        $this->guardName = 'student';
        
        parent::__construct();
    }
}
