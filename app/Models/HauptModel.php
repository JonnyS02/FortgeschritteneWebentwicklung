<?php

namespace App\Models;

use CodeIgniter\Model;

class HauptModel extends Model
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
        //concat, limit 12 , alles in der querry
        $query = $this->db->table('umsaetze');
        $query->select();
        $result = $query->get();
        return $result->getResultArray();
    }

    public function crudePersonen(): ?array
    {
        if ($_POST['todo'] == 'create') {
            unset($_POST['todo']);
            unset($_POST['id']);
            $this->db->table('personen')->insert($_POST);
            return ['status' => 'success', 'message' => 'Person created successfully'];

        } elseif ($_POST['todo'] == 'update') {
            unset($_POST['todo']);
            $this->db->table('personen')->where('id', $_POST['id'])->update($_POST);
            return ['status' => 'success', 'message' => 'Person updated successfully'];

        } elseif ($_POST['todo'] == 'delete') {
            $this->db->table('personen')->where('id', $_POST['id'])->delete();
            return ['status' => 'success', 'message' => 'Person deleted successfully'];

        } elseif ($_POST['todo'] == 'read') {
            $query = $this->db->table('personen');
            $query->select();
            if (isset($_POST['id'])) {
                $query->where('id', $_POST['id']);
            }
            $result = $query->get();
            return $result->getResultArray();
        } else {
            return ['status' => 'error', 'message' => 'Invalid operation'];
        }
    }
}





