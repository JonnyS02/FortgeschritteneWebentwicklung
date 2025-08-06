<?php

namespace App\Controllers;

class Startseite extends BaseController
{
    public function index(): string
    {
        return $this->viewMod('startseite');
    }
}
