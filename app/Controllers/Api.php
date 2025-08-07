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

    public function getPersonenApi(): ResponseInterface
    {
        $personen = $this->hauptModel->getPersonen();
        return $this->respond($personen);
    }
}
