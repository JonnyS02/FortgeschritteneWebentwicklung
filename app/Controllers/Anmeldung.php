<?php

namespace App\Controllers;

class Anmeldung extends BaseController
{
    public function index(): string
    {
        return $this->viewMod('anmeldung');
    }
}
