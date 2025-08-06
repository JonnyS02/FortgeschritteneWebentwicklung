<?php

namespace App\Controllers;

use App\Models\Test;

class Home extends BaseController
{
    public function __construct()
    {
        $this->Test = new Test();
    }
    public function index(): string
    {
        $data['test'] = $this->Test->getProfile();
        return $this->viewMod('home',$data);
    }
}
