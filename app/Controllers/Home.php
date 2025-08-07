<?php

namespace App\Controllers;

use App\Models\HauptModel;
use Config\Services;
use Mpdf\HTMLParserMode;
use Mpdf\Mpdf;

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
        $page   = max(1, (int) ($this->request->getGet('page')  ?? 1));
        $limit  = max(1, (int) ($this->request->getGet('limit') ?? 25));
        $sort   = $this->request->getGet('sort')  ?: 'id';
        $order  = strtoupper($this->request->getGet('order') ?: 'ASC');
        $search = trim((string) ($this->request->getGet('search') ?? ''));

        $params = [
            'page'   => $page,
            'limit'  => $limit,
            'sort'   => $sort,
            'order'  => $order,
            'search' => $search
        ];
        $personen = $this->hauptModel->getPersonen($params);

        ini_set('pcre.backtrack_limit', '5000000');
        ini_set('pcre.recursion_limit', '500000');

        $mpdf = new Mpdf([
            'format'       => 'A4',
            'tempDir'      => WRITEPATH . 'mpdf',
            'margin_top'   => 32,
            'margin_right' => 15,
            'margin_bottom'=> 20,
            'margin_left'  => 15,
        ]);
        $mpdf->packTableData = true;
        $mpdf->simpleTables  = true;

        $mpdf->SetHTMLHeader(
            '<div style="font-family:sans-serif;font-size:12px;color:#555;border-bottom:1px solid #ddd;padding-bottom:6px;">
            <strong>Personen – aktuelle Ansicht</strong>
            <span style="float:right;">{DATE d.m.Y H:i}</span>
         </div>'
        );
        $mpdf->SetHTMLFooter(
            '<div style="font-family:sans-serif;font-size:11px;color:#777;border-top:1px solid #eee;padding-top:6px;text-align:center;">
            Seite {PAGENO} / {nbpg}
         </div>'
        );

        // CSS
        $css = 'body{font-family:sans-serif}
        h1{font-size:18px;margin:0 0 10px}
        table{width:100%;border-collapse:collapse}
        thead th{background:#f2f4f8;color:#222;font-weight:600;font-size:12px;border-bottom:1px solid #dfe3e8;padding:8px 6px;text-align:left}
        tbody td{font-size:11.5px;padding:7px 6px;border-bottom:1px solid #eee}
        tbody tr:nth-child(even) td{background:#fafbfc}';
        $mpdf->WriteHTML($css, HTMLParserMode::HEADER_CSS);

        $mpdf->WriteHTML('<h1>Personen</h1>', HTMLParserMode::HTML_BODY);
        $mpdf->WriteHTML('
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
            <tbody>', HTMLParserMode::HTML_BODY);

        $batchSize = 200;
        $buffer    = '';
        $count     = 0;

        foreach ($personen as $row) {
            $buffer .= '<tr>'
                . '<td>'.htmlspecialchars((string)($row['id'] ?? '')).'</td>'
                . '<td>'.htmlspecialchars((string)($row['vorname'] ?? '')).'</td>'
                . '<td>'.htmlspecialchars((string)($row['name'] ?? '')).'</td>'
                . '<td>'.htmlspecialchars((string)($row['strasse'] ?? '')).'</td>'
                . '<td>'.htmlspecialchars((string)($row['plz'] ?? '')).'</td>'
                . '<td>'.htmlspecialchars((string)($row['ort'] ?? '')).'</td>'
                . '<td>'.htmlspecialchars((string)($row['username'] ?? '')).'</td>'
                . '</tr>';

            if ((++$count % $batchSize) === 0) {
                $mpdf->WriteHTML($buffer, HTMLParserMode::HTML_BODY);
                $buffer = '';
            }
        }
        if ($buffer !== '') {
            $mpdf->WriteHTML($buffer, HTMLParserMode::HTML_BODY);
        }

        $mpdf->WriteHTML('</tbody></table>', HTMLParserMode::HTML_BODY);

        return $this->response
            ->setHeader('Content-Type', 'application/pdf')
            ->setBody($mpdf->Output('personen-ansicht.pdf', \Mpdf\Output\Destination::STRING_RETURN));
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
