<?php

namespace App\Controllers;

use App\Models\Test;

class Home extends BaseController
{
    public function index(): string
    {
        $data['test'] = (new Test())->getProfile();
        return $this->viewMod('home',$data);
    }
}
