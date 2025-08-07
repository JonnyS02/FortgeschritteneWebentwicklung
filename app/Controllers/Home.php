<?php

namespace App\Controllers;

use App\Models\HauptModel;

class Home extends BaseController
{
    public function __construct()
    {
        $this->hauptModel = new HauptModel();
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
        $personen = $this->hauptModel->getPersonen();
        return json_encode($personen);
    }

    public function startseite(): string
    {
        $umsaetze = $this->hauptModel->getUmsaetze();
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
