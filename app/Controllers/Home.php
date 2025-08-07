<?php

namespace App\Controllers;

use AIAccess\Provider\Gemini\Client;
use App\Models\HauptModel;
use Config\Services;

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

    function wetter()
    {
        $client = Services::curlrequest();
        $response = $client->get('https://api.openweathermap.org/data/2.5/weather?q=Trier&appid=f565171f49fd6353914ea7be853091fa&units=metric&lang=de');
        $data['wetter'] = json_decode($response->getBody(), true);
        return $this->viewMod('wetter',$data);
    }

    function KIChat(): string
    {
        $client = new Client(env('AI_API_KEY'));
        $chat = $client->createChat('gemini-2.5-flash');

        $data['question'] = 'Was ist der Sinn des Lebens?';
        $data['response'] = $chat->sendMessage($data['question'])->getText();
        return $this->viewMod('KIChat', $data);
    }
}
