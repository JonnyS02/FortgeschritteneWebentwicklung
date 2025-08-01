<?php

namespace App\Controllers;

class Map extends BaseController
{
    public function index(): string
    {
        return $this->viewMod('map');
    }
}
