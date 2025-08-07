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

    public function getPersonenApi(): ?ResponseInterface
    {
        $request = service('request');
        $authHeader = $request->getHeaderLine('Authorization');
        if(!$authHeader || $authHeader !== 'Bearer Team#01') {
            return $this->failUnauthorized('Unauthorized access');
        }
        return $this->respond(
            $this->hauptModel->getPersonen(),
            200,
            'Personen retrieved successfully'
        );
    }
}
