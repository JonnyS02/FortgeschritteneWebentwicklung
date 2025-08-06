<?php

namespace App\Controllers;

use App\Models\PersonenModel;

class Startseite extends BaseController
{
    public function index(): string
    {
        return $this->viewMod('startseite');
    }
}
