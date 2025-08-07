<?php

namespace App\Controllers;

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
}
