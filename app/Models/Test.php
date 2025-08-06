<?php

namespace App\Models;

use CodeIgniter\Model;

class Test extends Model
{
    public function getProfile(): ?array
    {
        $query = $this->db->table('personen');
        $query->select();
        $result = $query->get();
        return ($result->getResultArray());
    }

}