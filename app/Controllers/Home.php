<?php

namespace App\Controllers;

use App\Models\PersonenModel;

class Home extends BaseController
{
    public function __construct()
    {
        $this->PersonenModel = new PersonenModel();
    }

    public function anmeldung(): string
    {
        return $this->viewMod('anmeldung');
    }

    public function personen(): string
    {
        return $this->viewMod('personen');
    }

    public function getPersonenAJAX(): string
    {
        $personen = $this->PersonenModel->getPersonen();
        return json_encode($personen);
    }

    public function karte(): string
    {
        return $this->viewMod('karte');
    }

    public function startseite(): string
    {
        return $this->viewMod('startseite');
    }
}
