<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\AuthController as BaseAuthController;

class LoginController extends BaseAuthController
{
    public function __construct()
    {
        $this->guardName = 'admin';
        
        parent::__construct();
    }
}
