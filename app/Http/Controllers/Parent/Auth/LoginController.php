<?php

namespace App\Http\Controllers\Parent\Auth;

use App\Http\Controllers\AuthController as BaseAuthController;

class LoginController extends BaseAuthController
{
    public function __construct()
    {
        $this->guardName = 'parent';
        
        parent::__construct();
    }
}
