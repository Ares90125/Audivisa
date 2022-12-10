<?php

namespace App\Http\Controllers\Player\Auth;

use App\Http\Controllers\AuthController as BaseAuthController;

class LoginController extends BaseAuthController
{
    public function __construct()
    {
        $this->guardName = 'player';
        
        parent::__construct();
    }
}
