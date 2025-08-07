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


    public function getUmsatz(): ?array
    {
        $query = $this->db->table('umsaetze');
        $query->select();
        $query->limit(12);
        $query->orderBy('id','DESC');
        $result = $query->get();
        return $result->getResultArray();
    }

    public function crudPersonen(): ?array
    {
        $todo = $_POST['todo'];
        unset($_POST['todo']);

        if ($todo == 'create') {
            unset($_POST['id']);
            $this->db->table('personen')->insert($_POST);
            return ['status' => 'success', 'message' => 'Person created successfully'];

        } elseif ($todo == 'update') {
            $this->db->table('personen')->where('id', $_POST['id'])->update($_POST);
            return ['status' => 'success', 'message' => 'Person updated successfully'];

        } elseif ($todo == 'delete') {
            $this->db->table('personen')->where('id', $_POST['id'])->delete();
            return ['status' => 'success', 'message' => 'Person deleted successfully'];

        } elseif ($todo == 'read') {
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





