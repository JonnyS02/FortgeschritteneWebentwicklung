<?php

namespace App\Controllers;

use App\Models\HauptModel;
use Config\Services;

class Home extends BaseController
{
    public function __construct()
    {
        $this->hauptModel = new HauptModel();
    }

    public function startseite(): string
    {
        $client = Services::curlrequest();
        $response = $client->get('https://api.openweathermap.org/data/2.5/weather?q=Trier&appid=f565171f49fd6353914ea7be853091fa&units=metric&lang=de');
        $data['wetter'] = json_decode($response->getBody(), true);
        return $this->viewMod('startseite', $data);
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

    public function getPersonenPDF()
    {

    }

    function umsatz(): string
    {
        $umsatz = $this->hauptModel->getUmsatzListe();
        $data['umsatz'] = json_encode(array_column($umsatz, 'umsatz'));
        $monate = [];
        foreach ($umsatz as $row) {
            $monate[] = "{$row['jahr']}/{$row['monat']}";
        }
        $monate = array_reverse($monate);
        $data['monat'] = json_encode($monate);

        $vergleich = $this->hauptModel->getUmsatzVergleich();
        $data['thisYear'] = $vergleich['thisYear'];
        $data['lastYear'] = $vergleich['lastYear'];

        return $this->viewMod('umsatz', $data);
    }

    function KIChat(): string
    {
        return $this->viewMod('KIChat');
    }
}
