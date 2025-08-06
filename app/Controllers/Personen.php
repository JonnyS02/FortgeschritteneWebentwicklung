<?php

namespace App\Controllers;

use App\Models\PersonenModel;

class Personen extends BaseController
{
    public function __construct()
    {
        $this->PersonenModel = new PersonenModel();
    }

    public function index(): string
    {
        return $this->viewMod('personen');
    }

    public function getPersonenAJAX(): string
    {
        $personen = $this->PersonenModel->getPersonen();
        return json_encode($personen);
    }
}
