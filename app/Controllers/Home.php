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
        return json_encode($personen) ;
    }

    public function karte(): string
    {
        return $this->viewMod('karte');
    }

    public function startseite(): string
    {
        $umsaetze = $this->PersonenModel->getUmsaetze();
        $data['umsaetze'] = json_encode(array_column($umsaetze, 'umsatz'));
        $data['labels'] = json_encode(
            array_map(
                fn($row) => $row['jahr'] . '/' . $row['monat'],
                $umsaetze
            )
        );
        return $this->viewMod('startseite',$data);
    }
}
