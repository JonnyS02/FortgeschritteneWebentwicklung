<?php

namespace App\Models;

use CodeIgniter\Model;

class PersonenModel extends Model
{

    public function getPersonen(): ?array
    {
        $query = $this->db->table('personen');
        $query->select();
        $result = $query->get();
        return $result->getResultArray();
    }


    public function getUmsaetze(): ?array
    {
        $query = $this->db->table('umsaetze');
        $query->select();
        $result = $query->get();
        return $result->getResultArray();
    }
}





