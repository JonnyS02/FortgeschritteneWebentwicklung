<?php

namespace App\Controllers;

class Login extends BaseController
{
    public function index(): string
    {
        return $this->viewMod('login');
    }
}
