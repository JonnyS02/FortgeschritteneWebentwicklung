<?php

namespace App\Controllers;

use AIAccess\Chat\Role;
use AIAccess\Provider\Gemini\Client;
use App\Models\HauptModel;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class Api extends ResourceController
{
    public function __construct()
    {
        $this->hauptModel = new HauptModel();
    }

    public function crudePersonApi(): ResponseInterface
    {
        $request = service('request');
        $authHeader = $request->getHeaderLine('Authorization');
        //wischen authorisiert und gültig unterscheiden bearer splitten
        if($authHeader !== 'Bearer Team#01') {
            return $this->failUnauthorized('Unauthorized access');
        }
        return $this->respond(
            $this->hauptModel->crudPersonen(),
            200,
            'Personen CRUD operations successful'
        );
    }

    public function KIApi(): ResponseInterface
    {
        $client  = new Client(env('AI_API_KEY'));
        $chat    = $client->createChat('gemini-2.5-flash');

        $history = json_decode($_POST['history'], true);

        foreach ($history as $msg) {
            if ($msg['role'] === 'user') {
                $chat->addMessage($msg['content'],Role::User);
            } else {
                $chat->addMessage($msg['content'],Role::Model);
            }
        }

        $answer   = $chat->sendMessage($_POST['question'])->getText();

        return $this->respond($answer, 200, 'KI response successful');
    }
}
