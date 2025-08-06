<?php

namespace App\Models;

use CodeIgniter\Model;

class PersonenModel extends Model
{
    public function getPersonen($person_id = null): ?array
    {
        $query = $this->db->table('personen');
        $query->select();
        $result = $query->get();
        return $result->getResultArray();
    }

    public function getPersonenAJAX($person_id = null): string
    {
        $personen = $this->getPersonen($person_id);
        return json_encode($personen);
    }
}