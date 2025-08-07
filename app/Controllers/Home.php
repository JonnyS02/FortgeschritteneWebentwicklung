<?php

namespace App\Controllers;

use App\Models\HauptModel;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;
use Mpdf\HTMLParserMode;
use Mpdf\Mpdf;
use Mpdf\Output\Destination;

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

    public function getPersonenPDF(): ResponseInterface
    {
        $ids = $this->request->getPost('ids');
        $personen = $this->hauptModel->getPersonen();

        $personen = array_filter($personen, function ($p) use ($ids) {
            return in_array($p['id'], $ids);
        });
        $personen = array_values($personen);


        $mpdf = new Mpdf([
            'format' => 'A4',
            'tempDir' => WRITEPATH . 'mpdf',
        ]);

        $css = '
    body { 
        font-family: Arial, sans-serif; 
        color: #333; 
    }
    h1 {
        font-size: 20px;
        margin-bottom: 15px;
        color: #222;
        text-align: center;
    }
    table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
        margin-top: 10px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    }
    thead th {
        background: linear-gradient(90deg, #4A90E2, #357ABD);
        color: #fff;
        font-weight: 600;
        font-size: 12px;
        padding: 10px 8px;
        text-align: left;
        border-bottom: 2px solid #2f5f91;
    }
    tbody td {
        font-size: 11.5px;
        padding: 8px;
        border-bottom: 1px solid #e5e5e5;
    }
    tbody tr:nth-child(even) td {
        background-color: #f8faff;
    }
    tbody tr:last-child td {
        border-bottom: none;
    }
    tbody tr td:first-child {
        font-weight: bold;
        color: #555;
    }
    .small-text {
        font-size: 10px;
        color: #777;
        text-align: right;
        margin-top: 4px;
    }
';
        $mpdf->WriteHTML($css, HTMLParserMode::HEADER_CSS);

        $html = '
        <h1>Eine wirklich sehr schöne Personenliste :D</h1>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Vorname</th>
                    <th>Nachname</th>
                    <th>Straße</th>
                    <th>PLZ</th>
                    <th>Ort</th>
                    <th>Username</th>
                </tr>
            </thead>
            <tbody>
    ';

        foreach ($personen as $p) {
            $html .= '<tr>'
                . '<td>' . $p['id'] . '</td>'
                . '<td>' . $p['vorname'] . '</td>'
                . '<td>' . $p['name'] . '</td>'
                . '<td>' . $p['strasse'] . '</td>'
                . '<td>' . $p['plz'] . '</td>'
                . '<td>' . $p['ort'] . '</td>'
                . '<td>' . $p['username'] . '</td>'
                . '</tr>';
        }

        $html .= '</tbody></table>';
        $mpdf->WriteHTML($html, HTMLParserMode::HTML_BODY);

        // PDF ausgeben
        return $this->response
            ->setHeader('Content-Type', 'application/pdf')
            ->setBody($mpdf->Output('personen-tabelle.pdf', Destination::STRING_RETURN));
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
