<?php

namespace App\Controllers;

use App\Models\PersonenModel;

class Home extends BaseController
{
    public function __construct()
    {
        $this->PersonenModel = new PersonenModel();
    }
    public function index(): string
    {
        $data['personen'] = $this->PersonenModel->getPersonen();
        return $this->viewMod('home',$data);
    }
}
