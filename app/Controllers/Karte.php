<?php

namespace App\Controllers;

class Karte extends BaseController
{
    public function index(): string
    {
        return $this->viewMod('karte');
    }
}
