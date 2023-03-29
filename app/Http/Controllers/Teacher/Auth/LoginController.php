<?php

namespace App\Http\Controllers\Teacher\Auth;

use App\Http\Controllers\AuthController as BaseAuthController;

class LoginController extends BaseAuthController
{
    public function __construct()
    {
        $this->guardName = 'teacher';
        
        parent::__construct();
    }
}
